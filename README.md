# Quickstart

*Gittobook* (git-to-book) is an easy way to write to multiple formats using Markdown. It is basically a bridge between pandoc (<http://pandoc.org>) and git. Pandoc is used to generate the different formats, and git repos are used to store the written markdown files, and assets, such as pandoc templates and css. There is a online demo version, which you can log in to using a facebook or google account. This can be found on <http://gittobook.org>. The online version will export to Epub, Mobi and HTML. If you install it on your own server you will be able to export to any kind of format supported by pandoc, e.g. PDF. 

When you add a new git URL to the system, gittobook will checkout the repo, and look for any markdown files (`.md`). It will always checkout the master branch. Note: `README.md` will be ignored. The markdown files found are collected into one document, which is then transformed using pandoc. The gittobook will prepend a `meta.yaml` file if one is found (for adding meta data to the document - such as author, title, cover-image, etc). You can browse this documentation on <https://github.com/diversen/git-to-book-docs>, which is the repo used to generate the gittobook docs, and suggest edits. If you work on a larger book you can just add some directories to keep you content in. The file structure is parsed so that any directories are first examined for markdown or `.md` files. This resembles the way <http://github.com> displays files, when looking at a repo online.  

# meta.yaml

In the mata.yaml you can (and should) specify title, author, and other meta info used with pandoc. You can also specify build commands used, when pandoc executes the command. You can see an example here: <https://github.com/diversen/git-to-book-docs/blob/master/meta.yaml>. You will see that the `format-arguments` are specific to gittobook, else it is a standard pandoc meta file. The `format-arguments` are the command line options given to pandoc. 

# Install local

Requirements: 

* apache2
* php5 >= 5.3
* mysql-server
* pandoc
* texlive-full

First clone the base system: 

    git clone git://github.com/diversen/coscms.git yoursite

Enter base system: 

    cd yoursite

Enable apache2 host

    // you will need to be root
    sudo ./coscli.sh apache2 --en yoursite

Ready to install. You will be asked about DB configuration.  Will ask you for version to install. Check out the `latest version` version or try `master` (tagged versions are tested and should work, while master will work 99% of the time work as well). After writing the `config/config.ini` file and install all profile's modules from git repos. At last system will prompt you for a super user. 

    ./coscli.sh prompt-install --install

Select gittobook profile when asked. 

Set correct perms for public files after install (e.g. upload folder)

    // you will need to be root user as we change
    // the perms to be www-data
    sudo ./coscli.sh file --chmod-files

Add a user: 

     ./coscli.sh useradd --add

# Resources

Here is a document showing the pandoc markdown.  

<http://johnmacfarlane.net/pandoc/demo/example9/pandocs-markdown.html>

pandoc -S -o book.epub title.txt test.md

Math LaTex

<http://en.wikibooks.org/wiki/LaTeX/Mathematics>

Some Pandoc templates

https://github.com/jgm/pandoc/wiki/User-contributed-templates

