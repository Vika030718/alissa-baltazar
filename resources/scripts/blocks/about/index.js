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
            description,
            location,
            ctaText,
            ctaUrl,
            quote,
            imageId,
            imageUrl,
        } = attributes;

        const blockProps = useBlockProps();

        return (
            <>
                <InspectorControls>
                    <PanelBody title="About settings">

                        <MediaUploadCheck>
                            <MediaUpload
                                allowedTypes={['image']}
                                value={imageId}
                                onSelect={(media) =>
                                    setAttributes({
                                        imageId: media.id,
                                        imageUrl: media.url,
                                    })
                                }
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
                    <div className="about">

                        {imageUrl && (
                            <img
                                src={imageUrl}
                                alt=""
                                className="about__image"
                            />
                        )}

                        <div className="about__content">

                            <RichText
                                tagName="p"
                                value={eyebrow}
                                placeholder="Eyebrow..."
                                onChange={(eyebrow) => setAttributes({ eyebrow })}
                            />

                            <RichText
                                tagName="h2"
                                value={heading}
                                placeholder="Heading..."
                                onChange={(heading) => setAttributes({ heading })}
                            />

                            <RichText
                                tagName="p"
                                value={description}
                                placeholder="Description..."
                                onChange={(description) =>
                                    setAttributes({ description })
                                }
                            />

                            <RichText
                                tagName="p"
                                value={location}
                                placeholder="Location / availability..."
                                onChange={(location) =>
                                    setAttributes({ location })
                                }
                            />

                            <RichText
                                tagName="span"
                                value={ctaText}
                                placeholder="CTA text..."
                                onChange={(ctaText) =>
                                    setAttributes({ ctaText })
                                }
                            />

                            <RichText
                                tagName="blockquote"
                                value={quote}
                                placeholder="Quote..."
                                onChange={(quote) =>
                                    setAttributes({ quote })
                                }
                            />

                        </div>
                    </div>
                </section>
            </>
        );
    },

    save() {
        return null;
    },
});