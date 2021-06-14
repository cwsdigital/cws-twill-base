const resolveConfig = require("tailwindcss/resolveConfig")
const tailwindConfig = require("../../tailwind.config.js")

const { theme } = resolveConfig(tailwindConfig)

module.exports = theme

