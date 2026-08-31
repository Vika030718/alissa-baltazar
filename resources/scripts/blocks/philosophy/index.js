import { registerBlockType } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

import metadata from './block.json';

registerBlockType(metadata.name, {
    ...metadata,

    edit({ attributes, setAttributes }) {
        const { eyebrow, statement } = attributes;
        const blockProps = useBlockProps();

        return (
            <section {...blockProps}>
                <div className="philosophy">
                    <RichText
                        tagName="p"
                        className="philosophy__eyebrow"
                        value={eyebrow}
                        placeholder="Eyebrow..."
                        onChange={(eyebrow) => setAttributes({ eyebrow })}
                    />

                    <RichText
                        tagName="h2"
                        className="philosophy__statement"
                        value={statement}
                        placeholder="Philosophy statement..."
                        onChange={(statement) => setAttributes({ statement })}
                    />
                </div>
            </section>
        );
    },

    save() {
        return null;
    },
});