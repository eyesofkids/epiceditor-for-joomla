# EpicEditor-for-Joomla
EpicEditor for Joomla! and others plugins, useful addons.

# Description 

EpicEditor for Joomla! project include lots of libraries and addons:

## [EpicEditor](https://github.com/OscarGodson/EpicEditor)
is an embeddable JavaScript Markdown editor with split fullscreen editing, live previewing, automatic draft saving, offline support, and more. For developers, it offers a robust API, can be easily themed, and allows you to swap out the bundled Markdown parser with anything you throw at it. 

## [Parsedown](https://github.com/erusev/parsedown)
 Better Markdown Parser in PHP

## [Parsedown Extra](https://github.com/erusev/parsedown-extra) 
An extension of Parsedown that adds support for Markdown Extra.

## [to-markdown](https://github.com/domchristie/to-markdown)
An HTML to Markdown converter written in JavaScript.

## [Highlight.js](https://github.com/isagalaev/highlight.js)
Javascript syntax highlighter 
https://highlightjs.org/

# Installation
Download the package and install it from the Extension Manager in the back-end.
The package will install the extensions included:
- lib_parsedown
- plg_system_parsedown
- plg_content_parsedown
- plg_editors_epcieditor

# Uninstallation
Uninstall it from the **Manage** area of the Extension Manager in the back-end.
The name of this package is **EpicEditor Package**

# Setting
Some settings should be enabled and configurate before you use them.

## System - Parsedown & highlight.js
- Enable this plugin and it will register the Parsedown & ParsedownExtra libraries to Joomla!.
- highlight.js is disabled by default. If you want the code highlight syntax function, setting it to **ON** in the setting page.
- You can set the style for hightling.js as well. (workable if highlight.js function is **ON**)

## Content - Parsedown
- Enable this plugin and it will parse all the markdown format of the content(article).
- If you want it also parses the **Custom HTML** module, don't forget to turn the option **Prepare Content** to **Yes** in the **Options** tab.

## Editor - EpicEditor
- Choose it for your **Default Editor** in the **Global Configuration** page.
- You can choose different editor and preview theme in the detail page of this plugin(Plugin Manager: Editor - EpicEditor).
- **AutoSave** is **1000 ms** by default.

# Other Notice
- Internet Explorer browser is not recommended to use with it. Some functions are not workable.
- Image and Article editor-xtd button will auto converter to markdown format.
- EpicEditor will use the localStorage in your browser to autosave the content in its editor.

# Screenshot / Demo


# Changelog
Take a look into "Changelog" file.

