import { registerBlockType } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';

import metadata from './block.json';

registerBlockType(metadata.name, {
    ...metadata,

    edit({ attributes, setAttributes }) {
        const { eyebrow, heading } = attributes;
        const blockProps = useBlockProps();

        const posts = useSelect(
            (select) =>
                select('core').getEntityRecords('postType', 'post', {
                    per_page: 3,
                    orderby: 'date',
                    order: 'desc',
                    _embed: true,
                }),
            []
        );

        return (
            <section {...blockProps}>
                <div className="journal">
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
                        {(posts || []).map((post) => (
                            <div key={post.id}>
                                {post.title.rendered}
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        );
    },

    save() {
        return null;
    },
});