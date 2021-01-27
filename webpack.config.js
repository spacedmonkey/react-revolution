/**
 * WordPress dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
/**
 * External dependencies
 */
const OptimizeCSSAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const WebpackBar = require( 'webpackbar' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	output: {
		...defaultConfig.output,
		path: path.resolve( process.cwd(), 'assets' ),
	},
	optimization: {
		...defaultConfig.optimization,
		minimizer: [
			...defaultConfig.optimization.minimizer,
			new OptimizeCSSAssetsPlugin( {} ),
		],
	},
	plugins: [
		...defaultConfig.plugins,
		new MiniCssExtractPlugin( {
			filename: 'theme.css',
		} ),
		new WebpackRTLPlugin({
			filename: 'theme-rtl.css',
		} ),
		new WebpackBar( {
			name: 'Theme',
			color: '#fddb33',
		} ),
	],
};
