import { registerBlockType } from '@wordpress/blocks';
import {
    InspectorControls,
    MediaUpload,
    MediaUploadCheck,
    RichText,
    useBlockProps,
} from '@wordpress/block-editor';

import {
    Button,
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
            ctaText,
            ctaUrl,
            imageId,
            imageUrl,
            description,
        } = attributes;

        const blockProps = useBlockProps();

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Hero settings">
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) =>
                                    setAttributes({
                                        imageId: media.id,
                                        imageUrl: media.url,
                                    })
                                }
                                allowedTypes={['image']}
                                value={imageId}
                                render={({ open }) => (
                                    <Button
                                        variant="secondary"
                                        onClick={open}
                                    >
                                        {imageUrl ? 'Replace image' : 'Select image'}
                                    </Button>
                                )}
                            />
                        </MediaUploadCheck>

                        <TextControl
                            label="CTA URL"
                            value={ctaUrl}
                            onChange={(ctaUrl) => setAttributes({ ctaUrl })}
                        />
                    </PanelBody>
                </InspectorControls>

                <section {...blockProps}>
                    {imageUrl && (
                        <img
                            src={imageUrl}
                            alt=""
                        />
                    )}
                    <RichText
                        tagName="p"
                        value={eyebrow}
                        placeholder="Eyebrow text..."
                        onChange={(eyebrow) => setAttributes({ eyebrow })}
                    />

                    <RichText
                        tagName="h1"
                        value={heading}
                        placeholder="Enter hero heading..."
                        onChange={(heading) => setAttributes({ heading })}
                    />

                    <RichText
                        tagName="p"
                        value={description}
                        placeholder="Hero description..."
                        onChange={(description) => setAttributes({ description })}
                    />

                    <RichText
                        tagName="span"
                        value={ctaText}
                        placeholder="CTA text..."
                        onChange={(ctaText) => setAttributes({ ctaText })}
                    />
                </section>
            </>
        );
    },

    save() {
        return null;
    },
});