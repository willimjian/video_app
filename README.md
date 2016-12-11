# Video App

## Installation instructions
* `git clone https://github.com/Nualiian/video_app`
* `composer install`
* `npm install`
* `bower install`
* `gulp build` has to be run at least first time even when developing to compile materialize sass framework and its fonts (this is disabled in watch task to reduce compiling time to minimum while actively developing)
* `gulp watch` for development watching of resources
* `./deploy.sh <db_user>` to create the database and the tables
* change your apache / nginx config to accept moduel rewrite
* ready!