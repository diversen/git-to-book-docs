# Git to Book Documentation

ARGH

## Quickstart

**Gittobook** (git-to-book) is an easy way to write to multiple formats using Markdown - e.g. to Epub, Mobi, or PDF, which are often formats used to create books - online or for print. So It is basically a bridge between **pandoc** ([http://pandoc.org](http://pandoc.org)) and **git**. Pandoc is used to generate the different formats, and git repos are used to store the written markdown files, and assets, such as pandoc templates and css and images. The aim is to simplify pandoc by using some easier default options when creating Epub, Mobi, and PDF files. And also enable people (or maybe only myself :) to use git when writing large text documents, which will be transformed into different formats.  

There is a online demo version, which you can log in to (if you want to keep your content) - or just test it without logging in, by adding a repo (which will disappear in a day or so). This can be found on [http://gittobook.org](http://gittobook.org). The online version will export to Epub, Mobi, PDF and HTML, but with some restrictions in templates and options. 

When you add a new git URL to the system, gittobook will checkout the repo, and look for any markdown files (`.md`). It will always checkout the `default` branch - this is often `master`, but does not have to be master. The markdown files found are collected into one document, which is then transformed using pandoc. You can browse this documentation on [https://github.com/diversen/git-to-book-docs](https://github.com/diversen/git-to-book-docs), which is the repo used to generate the gittobook docs, and suggest edits. This document is just a simple `README.md`, which has been transformed by pandoc. 

If you work on a larger book you can just add some directories to keep you content better organised. The file structure is parsed so that any directories are first examined for markdown files, which should end on the `.md` extension. The way a directory is listed resembles the way [http://github.com](http://github.com) displays files, when looking at a repo online, which means directories are displayed first, and then files. In order to keep you files in the right order you can add e.g. `01-`, `02-` etc. in front of directories and documents, as this will give you the sorting you want. 

## Pandoc config / meta.yaml

The gittobook will prepend a `meta.yaml` file if one is found (for adding meta data to the document - such as author, title, cover-image, build commands, etc). In the `meta.yaml` you can (and should) specify title, author, and other meta info used with pandoc. You can also specify build commands used, when pandoc executes the command. You can see an example here: [https://github.com/diversen/git-to-book-docs/blob/master/meta.yaml](https://github.com/diversen/git-to-book-docs/blob/master/meta.yaml). You will see that the `format-arguments` are specific to gittobook, otherwise it is a standard pandoc `.yaml file`. The `format-arguments` are the command line options given to pandoc. You can also add files to `ignore-files`, e.g. `README.md`.

## Install local

### Requirements: 

* Apache2
* php5 >= 5.3
* mysql-server
* pandoc
* texlive-full (for PDF support)
* kindlegen (for Mobi support)

### Build

First clone the base system into e.g. yoursite: 

    git clone git://github.com/diversen/coscms.git yoursite

Enter the base system: 

    cd yoursite

Enable apache2 host:

    // you will need to be root
    sudo ./coscli.sh apache2 --en yoursite

Run install command: 

    ./coscli.sh prompt-install --install

Ready to install. Select gittobook profile when asked. You will be asked about DB configuration,  and version to install. Use the `latest version` version or try `master` (tagged versions are tested and should work, while master will work 99% of the time work as well). After writing the `config/config.ini` file the system will install all the gittobooks profile modules from git repos. At last system will prompt you for a super user. You don't need a real email - you can just use test / test: 

Set correct perms for public files after install (e.g. upload folder)

    // you will need to be root user as we change
    // the perms to be www-data
    sudo ./coscli.sh file --chmod-files

Go to http://yoursite

### System config

If you make the above install, then the system is multi user by default. But you can make a few configuration changes in order to change this. This shows the default `gitbook.ini` file which is located in `modules/gitbook`.

~~~ini
; who can use it
; user is a user which has signed up - 
; admin is created in the install proces
gitbook_allow = 'user'
; who is allowed to use the all options in meta.yaml
; insert unescaped inline HTML for e.g. videos
gitbook_allow_ext = 'admin'
; for 'gitbook_allow' only these formats works
gitbook_exports = 'epub,html,pdf'
; assets allowed for 'gitbook_allow'
gitbook_allow_assets = 'css,jpeg,jpg,png,gif'
~~~

## Useful Resources

Template variables 

[http://johnmacfarlane.net/pandoc/README.html#templates](http://johnmacfarlane.net/pandoc/README.html#templates)

The pandoc markdown.  

[http://johnmacfarlane.net/pandoc/demo/example9/pandocs-markdown.html](http://johnmacfarlane.net/pandoc/demo/example9/pandocs-markdown.html)

Math LaTex:

[http://en.wikibooks.org/wiki/LaTeX/Mathematics](http://en.wikibooks.org/wiki/LaTeX/Mathematics)

This: 

    $$
    \Gamma(z) = \int_0^\infty t^{z-1}e^{-t}dt\,.
    $$

renders:
 
$$
\Gamma(z) = \int_0^\infty t^{z-1}e^{-t}dt\,.
$$


Some other Pandoc templates:

[https://github.com/jgm/pandoc/wiki/User-contributed-templates](https://github.com/jgm/pandoc/wiki/User-contributed-templates)

## Pandoc options

The following pandoc options are allowed in the online version. If you build the software youself all options are allowed. Note: These descriptions are taken from pandoc documentation. 

Produce typographically correct output, converting straight quotes to curly quotes:

    -S
    --smart

Specify the base level for headers (defaults to 1)

    --base-header-level=[1-6]

Produce output with an appropriate header and footer 

    -s
    --standalone

Include an automatically generated table of contents

    --toc

Specify the number of section levels to include in the table of contents. The default is 3

    --toc-depth=[1-6]


Syntax highlight filter: Options are pygments (the default), kate, monochrome, espresso, zenburn, haddock, and tango.

    --highlight-style=[string]

Produce a standalone HTML file with no external dependencies, images and css will be embeded. 

    --self-contained

Produce HTML5 instead of HTML4. 

    --html5

Treat top-level headers as chapters in LaTeX, ConTeXt, and DocBook output.

    --chapters

Number section headings in LaTeX, ConTeXt, HTML, or EPUB output.

    -N
    --number-sections

Link to a CSS style sheet

    -c=[path/style.css]
    --css=[path/to/style.css]

Use the specified CSS file to style the EPUB

    --epub-stylesheet

Headers level in epub files. 

    --epub-chapter-level=[1-6]

Embed a epub font

    --epub-embed-font=[path/to/font]

Pandoc variables. 
 
    -V=variable 

Allowed subset of variables: 

    geometry:margin
    documentclass
    lang

Vairable example: 

    -V sansfont=Arial -V fontsize=12pt -V version=1.10
