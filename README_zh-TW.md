## 簡介

"EpicEditor for Joomla" 讓一個很讚的Markdown文字編輯器可以在Joomla CMS中使用。 EpicEditor是一個可嵌入的JavaScript Markdown編輯器，有「分離式的全螢幕編輯畫面」、「立即預覽」、「自動草稿儲存」、「離線支援」以及其他更多功能。不過它並"不"是一個所視即所得編輯器（WYSIWYG）。

## 下載

[JED中的項目](http://extensions.joomla.org/extensions/extension/edition/editors/epiceditor-for-joomla)

[Github](https://github.com/eyesofkids/epiceditor-for-joomla)

## 說明

### 功能:
- 全螢幕編輯畫面
- 立即預覽
- 自動草稿儲存
- 程式碼語法高亮度顯示 (Markdown程式碼區塊)
- Markdown剖析器(Parser) (PHP & JS)

### 備註:
- Internet Explorer瀏覽器不建議使用
- 圖片/文章 editor-xtd 按鈕會自動轉成Markdown語法
- EpicEditor會使用你的瀏覽器中的localStorage來作自動儲存

## 常見問答集(FAQ)

#### 在Joomla!中不是已經有像"ACE X Markdown Editor"或"RokPad"的編輯器，為何還要用"EpicEditor"？

事實上我是作給自己用的，我並不需要類似所視即所得編輯器（WYSIWYG）之類的東西。所有的文章並不是在網站上邊編輯邊修改的。我會在電腦上用其他更好用的Markdown編輯程式，然後貼到網站上而已。EpicEditor也不是一個WYSIWYG。對於語法已經簡單到不行的Markdown格式，根本也不需要龐大的WYSIWYG。至少EpicEditor夠小也夠簡單，執行起來會快些，而且可以稍微預覽一下看有沒有問題。

#### 為何有這麼多的套件包含在套件包裡？

不同功能互相搭配使用。像Parsedown與ParsedownExtra是一個PHP的Markdown格式剖析函式庫，Joomla!本身並沒有這個功能，所以它是必需的，至於其他的Javascript函式庫，像toMarkdown目前是用來轉換原本的插入圖片和文章功能為Markdown語法，而highlight.js用在像程式碼高亮度顯示用的。原本是想把另一套更輕量的Prism.js也加進來，不過它有點小問題，暫時先用highlight.js。未來有可能會有更多功能加進來。

#### 這個套件之後會繼續作那些部份？

我是想要全面的使用Markdown語法在Joomla!系統中，所以並不會只針對編輯器而已。有些Joomla的原本功能現在有些小小的問題，像是搜尋之類的。之後如果能一一解決會更完全。

## 安裝

下載套件包，在管理區的「擴充套件管理」中安裝。這個套件包會安裝下面的幾個擴充套件：

- lib_parsedown
- plg_system_parsedown
- plg_content_parsedown
- plg_editors_epcieditor

## 移除（或反安裝）

在管理區的「擴充套件管理」中的「管理」中移除這個套件包。它的名稱是"EpicEditor Package".（註：雖然你也可以一個個移除其中的套件，不過還是建議你一次移除這個套件包）

## 設定值

在你開始使用它時，有些設定值應該要被啟用或設定好。

### System - Parsedown & highlight.js

啟用這個外掛，它會註冊Parsedown & ParsedownExtra函式庫給Joomla!。

highlight.js預設是關閉的。如果你想要有程式碼高亮度顯示的功能，在設定頁中，將它設定為ON（開啟）。你也可以設定hightling.js要使用的樣式（只有當highlight.js啟用時才有作用）

### Content - Parsedown

啟用這個外掛，它將會把文章的Markdown格式內容剖析為HTML輸出。

如果你想要它也可以剖析"Custom HTML module"（自訂HTML模組），不要忘了要將在"選項"資訊標籤裡的"自訂內容"設定為"是"

### Editor - EpicEditor

在"全站設定"中選定它為預設的編輯器。

你可以在它的外掛詳細頁面中，選定不同的編輯器及預覽佈景。(Plugin Manager: Editor - EpicEditor)

自動儲存(AutoSave)預設為1000 ms。

## 圖片&展示畫面

![分離式全螢幕編輯畫面](https://raw.githubusercontent.com/eyesofkids/epiceditor-for-joomla/master/demo/fullscreen_editor.png)

![前台展示畫面](https://raw.githubusercontent.com/eyesofkids/epiceditor-for-joomla/master/demo/demo_screen.png)

## 參考

### [EpicEditor](https://github.com/OscarGodson/EpicEditor)
is an embeddable JavaScript Markdown editor with split fullscreen editing, live previewing, automatic draft saving, offline support, and more. For developers, it offers a robust API, can be easily themed, and allows you to swap out the bundled Markdown parser with anything you throw at it. 

### [Parsedown](https://github.com/erusev/parsedown)
 Better Markdown Parser in PHP

### [Parsedown Extra](https://github.com/erusev/parsedown-extra) 
An extension of Parsedown that adds support for Markdown Extra.

### [to-markdown](https://github.com/domchristie/to-markdown)
An HTML to Markdown converter written in JavaScript.

### [Highlight.js](https://github.com/isagalaev/highlight.js)
Javascript syntax highlighter https://highlightjs.org/
