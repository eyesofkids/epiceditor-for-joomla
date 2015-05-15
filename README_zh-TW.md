## 簡介

"EpicEditor for Joomla" 讓一個很讚的Markdown文字編輯器可以在Joomla CMS中使用。 EpicEditor是一個可嵌入的JavaScript Markdown編輯器，有「分離式的全螢幕編輯畫面」、「立即預覽」、「自動草稿儲存」、「離線支援」以及其他更多功能。不過它並"不"是一個所視即所得編輯器（WYSIWYG）。

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

## 下載

[JED中的項目](http://extensions.joomla.org/extensions/extension/edition/editors/epiceditor-for-joomla)

[Github](https://github.com/eyesofkids/epiceditor-for-joomla)
