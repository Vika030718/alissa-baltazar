import { registerBlockType } from '@wordpress/blocks';
import {
    InspectorControls,
    RichText,
    useBlockProps,
} from '@wordpress/block-editor';

import {
    PanelBody,
    SelectControl,
} from '@wordpress/components';

import { useSelect } from '@wordpress/data';

import metadata from './block.json';

registerBlockType(metadata.name, {
    ...metadata,

    edit({ attributes, setAttributes }) {
        const {
            eyebrow,
            heading,
            story1,
            story2,
            story3,
        } = attributes;

        const blockProps = useBlockProps();

        const stories = useSelect(
            (select) =>
                select('core').getEntityRecords('postType', 'story', {
                    per_page: -1,
                    orderby: 'date',
                    order: 'desc',
                }),
            []
        );

        const storyOptions = [
            {
                label: 'Select a Story',
                value: 0,
            },
            ...(stories || []).map((story) => ({
                label: story.title.rendered,
                value: story.id,
            })),
        ];

        const selectedIds = [story1, story2, story3];

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Selected Stories">
                        <SelectControl
                            label="Story 01"
                            value={story1}
                            options={storyOptions}
                            onChange={(story1) =>
                                setAttributes({
                                    story1: Number(story1),
                                })
                            }
                        />

                        <SelectControl
                            label="Story 02"
                            value={story2}
                            options={storyOptions}
                            onChange={(story2) =>
                                setAttributes({
                                    story2: Number(story2),
                                })
                            }
                        />

                        <SelectControl
                            label="Story 03"
                            value={story3}
                            options={storyOptions}
                            onChange={(story3) =>
                                setAttributes({
                                    story3: Number(story3),
                                })
                            }
                        />
                    </PanelBody>
                </InspectorControls>

                <section {...blockProps}>
                    <RichText
                        tagName="p"
                        value={eyebrow}
                        placeholder="Eyebrow..."
                        onChange={(eyebrow) => setAttributes({ eyebrow })}
                    />

                    <RichText
                        tagName="h2"
                        value={heading}
                        placeholder="Section heading..."
                        onChange={(heading) => setAttributes({ heading })}
                    />

                    <div>
                        {selectedIds.map((id, index) => {
                            const story = (stories || []).find(
                                (story) => story.id === id
                            );

                            return (
                                <div key={index}>
                                    {story
                                        ? story.title.rendered
                                        : `Story ${index + 1} not selected`}
                                </div>
                            );
                        })}
                    </div>
                </section>
            </>
        );
    },

    save() {
        return null;
    },
});