# Hype HTML5

## Features

Generally the markup was cleaned up by removing as many wraps as possible and new class names have been introduced on elements on which they make sense.

### General

* A minimalistic version of modernizr guarantees new HTML5 elements being styleable in legacy browsers.
* An option makes it possible to define a custom HTML doctype, if needed.
* An option makes it possible to define a custom HTML opening tag. This is enabled by default and renders the HTML5Boilerplate opening tag.
* An option makes it possible to define needed HTML/XML namespaces in the HTML opening tag.
* A hook guarantees the extensions stylesheets are included before all other extensions' styles.
* All of this is configureable by TypoScript.

### Content elements

* Content elements get wrapped inside `<section />` elements, except "Insert records", "Divider" and "HTML" which still use a `<div />` element.
* Alignment and position of elements is defined by all new CSS classes plus declarations.
* Some BE fields' values are used to render new CSS classnames for the content element wrapper.

*Example*

    <section id="csc-1" class="csc-default csc-content-text csc-layout-1 csc-frame-6" />

#### Header

* Headings are enclosed by the `<header />` element.
* Header and subheader are wrapped by the `<hgroup />` element.
* Header date uses the `<date />` element.

*Example*

    <section id="csc-1" class="csc-default csc-content-header">
      <header class="csc-alignment-center">
        <hgroup>
          <h1 class="csc-header">Header</h1>
          <h2 class="csc-subheader">Subheader</h2>
        </hgroup>
        <p class="csc-date">
          <time datetime="2016-08-04">08/04/16</time>
        </p>
      </header>
    </section>

#### Images

* Images are wrapped inside `<figure />` elements.
* Captions use the `<figcaption />` element.
* Captions are linked to the Longdesc-URL, if set.
* Caption alignment is realized by a new CSS classname.
* Image rows and columns are realized by new CSS classnames.
* Some BE fields' values are rendered as CSS classnames, like image effects, image quality, etc.
* Image orientation is applied as a CSS classname on the content element's wrapper element.
* No inline stylesheet declarations are being used anymore.

*Example*

    <section id="csc-1" class="csc-default csc-content-image csc-orientation-righttop">
      <div class="csc-imagewrap">
        <figure class="csc-image csc-column-first csc-column-last">
          <a href="#image-link"><img src="#image" alt="" /></a>
          <figcaption class="csc-caption">
            <a href="#longdesc-url">Caption</a>
          </figcaption>
        </figure>
      </div>
    </section>

#### Divider

* Uses a new markup.

*Example*

    <div id="csc-1" class="csc-default csc-div">
      <div class="csc-divider">
        <hr />
      </div>
    </div>

#### Bullets

* Linking to a specific list item is now possible due to a new id attribute.

*Example*

    <section id="csc-1" class="csc-default csc-content-bullets">
      <ul>
        <li id="csc-15:0" class="csc-odd">Item 1</li>
        <li id="csc-15:1" class="csc-even">Item 2</li>
        <li id="csc-15:2" class="csc-odd">Item 3</li>
        <li id="csc-15:3" class="csc-even">Item 4</li>
        <li id="csc-15:4" class="csc-odd">Item 5</li>
      </ul>
    </section>

#### Uploads

* Linking to a specific file item is now possible due to a new id attribute.
* A new filetype class makes it possible to style specific filetype items by CSS.
* The filesize is wrapped in a separate span element.

*Example*

    <section id="csc-1" class="csc-default csc-content-uploads">
      <dl>
        <dt id="csc-1:file.pdf" class="csc-odd csc-file-pdf">
          <a href="file.pdf">file.pdf</a>, <span class="csc-file-size">7.0 MiB</span>
        </dt>
        <dd class="csc-odd csc-description">Description</dd>
      </dl>
    </section>

### HTML Post-Processing

To output valid HTML5 some HTML post-processing is taking place.

* Removes the type attribute from javascript elements.
* Removes the type and media="all" attribute from stylesheet elements.
* Removes the width and height attribute from image elements.
* Removes the summary attribute from table elements.

## Resources

* Some icons are copyright © Yusuke Kamiyamane (p.yusukekamiyamane.com).
  All rights reserved. Licensed under a Creative Commons Attribution 3.0 license.

* Some icons are copyright © Mark James (www.famfamfam.com).
  All rights reserved. Licensed under a Creative Commons Attribution 2.5 license.

* Some icons are copyright © Prax08 (twitter.com/prax08).
  All rights reserved. Licensed under a Creative Commons Attribution 3.0 license.

If there are no icons included from the mentioned talents above, they still rock and you should check out their work.

## CREDITS

Thanks to all the people helping me with creating and testing this extension, especially:

* Riccardo De Contardi, for providing a lot of feedback.