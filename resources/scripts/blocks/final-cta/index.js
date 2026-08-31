import { registerBlockType } from '@wordpress/blocks';

import {
    InspectorControls,
    RichText,
    useBlockProps,
} from '@wordpress/block-editor';

import {
    PanelBody,
    TextControl,
} from '@wordpress/components';

import metadata from './block.json';

registerBlockType(metadata.name, {
    ...metadata,

    edit({ attributes, setAttributes }) {
        const {
            eyebrow,
            heading,
            description,
            ctaText,
            ctaUrl,
        } = attributes;

        const blockProps = useBlockProps();

        return (
            <>
                <InspectorControls>
                    <PanelBody title="CTA settings">
                        <TextControl
                            label="CTA URL"
                            value={ctaUrl}
                            onChange={(ctaUrl) => setAttributes({ ctaUrl })}
                        />
                    </PanelBody>
                </InspectorControls>

                <section {...blockProps}>
                    <div className="final-cta">
                        <RichText
                            tagName="p"
                            className="final-cta__eyebrow"
                            value={eyebrow}
                            placeholder="Eyebrow..."
                            onChange={(eyebrow) => setAttributes({ eyebrow })}
                        />

                        <RichText
                            tagName="h2"
                            className="final-cta__heading"
                            value={heading}
                            placeholder="Heading..."
                            onChange={(heading) => setAttributes({ heading })}
                        />

                        <RichText
                            tagName="p"
                            className="final-cta__description"
                            value={description}
                            placeholder="Description..."
                            onChange={(description) =>
                                setAttributes({ description })
                            }
                        />

                        <RichText
                            tagName="span"
                            className="final-cta__button"
                            value={ctaText}
                            placeholder="CTA text..."
                            onChange={(ctaText) => setAttributes({ ctaText })}
                        />
                    </div>
                </section>
            </>
        );
    },

    save() {
        return null;
    },
});