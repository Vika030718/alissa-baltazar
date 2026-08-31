import { registerBlockType } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

import metadata from './block.json';

registerBlockType(metadata.name, {
    ...metadata,

    edit({ attributes, setAttributes }) {
        const { stats } = attributes;
        const blockProps = useBlockProps();

        const updateStat = (index, key, value) => {
            const updatedStats = stats.map((stat, statIndex) => {
                if (statIndex !== index) {
                    return stat;
                }

                return {
                    ...stat,
                    [key]: value,
                };
            });

            setAttributes({
                stats: updatedStats,
            });
        };

        return (
            <section {...blockProps}>
                <div className="stats">
                    {stats.map((stat, index) => (
                        <div className="stats__item" key={index}>
                            <RichText
                                tagName="div"
                                className="stats__value"
                                value={stat.value}
                                placeholder="Value"
                                onChange={(value) => updateStat(index, 'value', value)}
                            />

                            <RichText
                                tagName="div"
                                className="stats__label"
                                value={stat.label}
                                placeholder="Label"
                                onChange={(label) => updateStat(index, 'label', label)}
                            />
                        </div>
                    ))}
                </div>
            </section>
        );
    },

    save() {
        return null;
    },
});