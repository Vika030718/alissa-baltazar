/**
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/filters}
 */
roots.register.filters('@scripts/filters');

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
import './blocks/hero';
import './blocks/stats';
import './blocks/philosophy';
import './blocks/selected-work';
import './blocks/about';
import './blocks/testimonials';
import './blocks/journal';
import './blocks/final-cta';