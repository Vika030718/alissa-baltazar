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
            rating,
            ratingText,
            reviewsUrl,
            testimonials,
        } = attributes;

        const blockProps = useBlockProps();

        const updateTestimonial = (index, key, value) => {
            const updatedTestimonials = testimonials.map(
                (testimonial, testimonialIndex) => {
                    if (testimonialIndex !== index) {
                        return testimonial;
                    }

                    return {
                        ...testimonial,
                        [key]: value,
                    };
                }
            );

            setAttributes({
                testimonials: updatedTestimonials,
            });
        };

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Google Reviews">
                        <TextControl
                            label="Reviews URL"
                            value={reviewsUrl}
                            onChange={(reviewsUrl) => setAttributes({ reviewsUrl })}
                        />
                    </PanelBody>
                </InspectorControls>

                <section {...blockProps}>
                    <div className="testimonials">
                        <RichText
                            tagName="p"
                            className="testimonials__eyebrow"
                            value={eyebrow}
                            placeholder="Eyebrow..."
                            onChange={(eyebrow) => setAttributes({ eyebrow })}
                        />

                        <RichText
                            tagName="h2"
                            className="testimonials__heading"
                            value={heading}
                            placeholder="Section heading..."
                            onChange={(heading) => setAttributes({ heading })}
                        />

                        <div className="testimonials__rating">
                            <RichText
                                tagName="span"
                                value={rating}
                                onChange={(rating) => setAttributes({ rating })}
                            />

                            <RichText
                                tagName="span"
                                value={ratingText}
                                onChange={(ratingText) => setAttributes({ ratingText })}
                            />
                        </div>

                        <div className="testimonials__grid">
                            {testimonials.map((testimonial, index) => (
                                <article
                                    className="testimonials__card"
                                    key={index}
                                >
                                    <RichText
                                        tagName="blockquote"
                                        value={testimonial.quote}
                                        placeholder="Client quote..."
                                        onChange={(quote) =>
                                            updateTestimonial(index, 'quote', quote)
                                        }
                                    />

                                    <RichText
                                        tagName="p"
                                        value={testimonial.name}
                                        placeholder="Client name..."
                                        onChange={(name) =>
                                            updateTestimonial(index, 'name', name)
                                        }
                                    />

                                    <RichText
                                        tagName="p"
                                        value={testimonial.source}
                                        placeholder="Source..."
                                        onChange={(source) =>
                                            updateTestimonial(index, 'source', source)
                                        }
                                    />
                                </article>
                            ))}
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