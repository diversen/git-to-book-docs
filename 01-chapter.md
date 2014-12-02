# Quickstart

*Git to book* is an easy way to write to multiple formats using Markdown. It is basically a bridge between pandoc and git. Pandoc is used to generate the different formats, and git repos are used to store the content written in markdown. There is a online demo version which you can log in to. The online version will export to epub, mobi and html. If you install it on your own server you will be able to export to any format supprted by pandoc, e.g. pdf. 

When adding a git URL to the system, the gittobook will checkout the repo, and look for any markdown files (.md). Note: README.md will be ignored. The files found are collected into one document, which is then transformed using pandoc. You can browse this documentation on <https://github.com/diversen/git-to-book-docs>, which is the repo used to generate the git-to-book-docs. If you work on a large book you can add dicetories to keep you content in. The file structure is parsed so that any directories are first examined for markdown. This resembles the way github.com displays files, when looking at the repo online.  

## meta.yaml

In the mata.yaml you can specify title, author, and other meta info used with pandoc. 

### Requirements

* php5 >= 5.3
* mysql-server
* pandoc
* tex-live

## Pandoc Markdown

Here is a document showing the pandoc markdown.  

<http://johnmacfarlane.net/pandoc/demo/example9/pandocs-markdown.html>


