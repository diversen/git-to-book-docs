# Git to Book

## Quickstart

**Gittobook** (git-to-book) is an easy way to write to multiple formats using Markdown. It is basically a bridge between **pandoc** (<http://pandoc.org>) and **git**. Pandoc is used to generate the different formats, and git repos are used to store the written markdown files, and assets, such as pandoc templates and css and images. There is a online demo version, which you can log in to using a facebook or google account. This can be found on <http://gittobook.org>. The online version will export to Epub, Mobi and HTML. If you install it on your own server you will be able to export to any kind of format supported by pandoc, e.g. PDF. 

When you add a new git URL to the system, gittobook will checkout the repo, and look for any markdown files (`.md`). It will always checkout the master branch. The markdown files found are collected into one document, which is then transformed using pandoc. You can browse this documentation on <https://github.com/diversen/git-to-book-docs>, which is the repo used to generate the gittobook docs, and suggest edits. This document is just a simple `README.md`, which has been transformed by pandoc. If you work on a larger book you can just add some directories to keep you content better organised. The file structure is parsed so that any directories are first examined for markdown files, which should end on the `.md` extension. The way a directory is listed resembles the way <http://github.com> displays files, when looking at a repo online.  

## Pandoc config / meta.yaml

The gittobook will prepend a `meta.yaml` file if one is found (for adding meta data to the document - such as author, title, cover-image, build commands, etc). In the `meta.yaml` you can (and should) specify title, author, and other meta info used with pandoc. You can also specify build commands used, when pandoc executes the command. You can see an example here: <https://github.com/diversen/git-to-book-docs/blob/master/meta.yaml>. You will see that the `format-arguments` are specific to gittobook, otherwise it is a standard pandoc `.yaml file`. The `format-arguments` are the command line options given to pandoc. You can also add files to `ignore-files`, e.g. `README.md`.

## Install local

Requirements: 

* Apache2
* php5 >= 5.3
* mysql-server
* pandoc
* texlive-full

First clone the base system into e.g. yoursite: 

    git clone git://github.com/diversen/coscms.git yoursite

Enter the base system: 

    cd yoursite

Enable apache2 host:

    // you will need to be root
    sudo ./coscli.sh apache2 --en yoursite

Run install command: 

    ./coscli.sh prompt-install --install

Ready to install. Select gittobook profile when asked. You will be asked about DB configuration,  and version to install. Use the `latest version` version or try `master` (tagged versions are tested and should work, while master will work 99% of the time work as well). After writing the `config/config.ini` file the system will install all the gittobooks profile modules from git repos. At last system will prompt you for a super user. 

Set correct perms for public files after install (e.g. upload folder)

    // you will need to be root user as we change
    // the perms to be www-data
    sudo ./coscli.sh file --chmod-files

Add a user (will prompt you for an email and a password) - you can just use test / test: 

     ./coscli.sh useradd --add

## System config

If you make the above install, then the system is multi user by default. But you can make a few configuration changes in order to change this. This shows the default `gitbook.ini` file which is located in `modules/gitbook`.

~~~ini
; who can use it
; user is a user which has signed up - 
; admin is created in the install proces
gitbook_allow = 'user'
; allow these formats to be created by a 'user'
; admin has rights to do what he wants
gitbook_exports = 'epub,html,pdf'
; who is allowed to use the all options in meta.yaml
; the all option means access to using templates
; be careful about this!  
gitbook_meta_allow = 'admin'
; assets allowed for user
gitbook_allow_assets = 'css,jpeg,jpg,png,gif'
~~~

As you see in the above `gitbook` config file.

## Useful Resources

The pandoc markdown.  

<http://johnmacfarlane.net/pandoc/demo/example9/pandocs-markdown.html>

Math LaTex:

<http://en.wikibooks.org/wiki/LaTeX/Mathematics>

Some Pandoc templates:

<https://github.com/jgm/pandoc/wiki/User-contributed-templates>

