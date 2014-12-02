# Quickstart

*Gittobook* (git-to-book) is an easy way to write to multiple formats using Markdown. It is basically a bridge between pandoc and git. Pandoc is used to generate the different formats, and git repos are used to store the content written in markdown. There is a online demo version which you can log in to. This can be found on <http://gittobook.org> The online version will export to Epub, Mobi and HTML. If you install it on your own server you will be able to export to any format supported by pandoc, e.g. PDF. 

When you add a git URL to the system, gittobook will checkout the repo, and look for any markdown files (.md). Note: README.md will be ignored. The files found are collected into one document, which is then transformed using pandoc. The gittobook will prepend a meta.yaml file if one is found (for addig meta data to the documnet). You can browse this documentation on <https://github.com/diversen/git-to-book-docs>, which is the repo used to generate the gittobook docs. If you work on a largere book you can add dicetories to keep you content in. The file structure is parsed so that any directories are first examined for markdown. This resembles the way github.com displays files, when looking at the repo online.  

## meta.yaml

In the mata.yaml you can specify title, author, and other meta info used with pandoc. 

## Install local

Requirements: 

* apache2
* php5 >= 5.3
* mysql-server
* pandoc
* tex-live

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

## Pandoc Markdown

Here is a document showing the pandoc markdown.  

<http://johnmacfarlane.net/pandoc/demo/example9/pandocs-markdown.html>

