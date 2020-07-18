const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const isProduction = process.argv[process.argv.indexOf('--mode') + 1] === 'production';

module.exports = {
    entry: { app: './src/js' },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './'),
        publicPath: '/'
    },
    watch: !isProduction,
    module: {
        rules: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: '/node_modules/'
            }, {
                test: /\.styl$/,
                use: [
                    'style-loader',
                    MiniCssExtractPlugin.loader,
                    { loader: 'css-loader'},
                    {
                        loader: 'postcss-loader',
                        options: { config: { path: './src/js/postcss.config.js' } }
                    },
                    { loader: 'stylus-loader' }
                ]
            }, {
                test: /\.css$/,
                use: [
                    'style-loader',
                    MiniCssExtractPlugin.loader,
                    { loader: 'css-loader' },
                    {
                        loader: 'postcss-loader',
                        options: { config: { path: './src/js/postcss.config.js' } }
                    }
                ]
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin({ cleanOnceBeforeBuildPatterns: ['./[name].js', './style.css'] }),
        new MiniCssExtractPlugin({ filename: 'style.css' })
    ]
};