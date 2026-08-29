import { registerBlockType } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

import metadata from './block.json';

registerBlockType(metadata.name, {
  ...metadata,

  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();
    const { heading } = attributes;

    return (
      <section {...blockProps}>
        <RichText
          tagName="h1"
          value={heading}
          placeholder="Enter hero heading..."
          onChange={(heading) => setAttributes({ heading })}
        />
      </section>
    );
  },

  save() {
    return null;
  },
});