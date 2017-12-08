## 1. Webcore
### The Concept

    Admin Page - UI Component - Front Page

1.  Backend Page (Admin)
    
    Scope of Admin Page :    
    preparing user admin input form, input data by writed or by data source referenced
    
2. UI Component (just a part of page)

    Scope of UI Component (widget) :    
    provide reusable part of UI (widget) to included in template of page,
    (*and defining tracking configuration user interaction for personalization)
         
    Scope of Page :    
    layout and styling UI Component generally to be a Page by incorporating a template
    
3. Frontend Page

    Scope of Front Page :    
    provide User Experience with content personalization using Persona and Pattern

### Installation

Copy and paste in terminal line by line, just hit Enter key

    git clone https://github.com/dandisy/webcore-cms.git

    composer install
    
    cp -rf infyomlabs vendor
    
    cp -rf infinety-es vendor

    cp .env.example .env

Make sure your server, create "core" database, edit .env using your favorite editor, 
for example using nano editor copy and paste this in terminal, and hit Enter key

    sudo nano .env

Again copy and paste in terminal line by line, and hit Enter key

    php artisan key:generate

    php artisan migrate --seed

Finally

    php artisan storage:link

then get it all on your favorite browser,

### Dependency

    * infyomlabs/laravel-generator
    
    * arrilot/laravel-widgets
    * atayahmet/laravel-nestable
    * barryvdh/laravel-debugbar
    * infinety-es/filemanager
    * league/glide-laravel
    * santigarcor/laratrust
    * harimayco/laravel-menu
    
    * spatie/laravel-activitylog
    * tymon/jwt-auth
    * seguce92/laravel-dompdf
    * maatwebsite/excel
    * khill/lavacharts

    For theme use :
    facuz/laravel-themes based on thinhbuzz/laravel-theme
    or yaapis/Theme
    instead teepluss/laravel-theme
    
    * nwidart/laravel-modules -> OPTIONAL
    * lavary/laravel-menu -> OPTIONAL
    * barryvdh/laravel-snappy -> OPTIONAL
    * h4cc/wkhtmltopdf-amd64 -> OPTIONAL
    * barryvdh/laravel-snappy -> OPTIONAL

    * toxic-lemurs/menu-builder -> ALTERNATIVE
    * mkdesignn/menubuilder -> ALTERNATIVE

//------------------------------------------------#


## 2. Features

1. Admin Template

    ![AdminLTE](https://camo.githubusercontent.com/e3bbc646d6ff473da2dd6cede2c968846a6982a6/68747470733a2f2f61646d696e6c74652e696f2f41646d696e4c5445322e706e67)

2. File Manager

    ![File Manager](https://cloud.githubusercontent.com/assets/74367/15646143/77016990-265c-11e6-9ecc-d82ae2c74f71.png)

3. Menu Manager

    ![Menu Manager](https://camo.githubusercontent.com/4da267766ad9a79696f8baf988115005ba8bfa9e/68747470733a2f2f7332382e706f7374696d672e6f72672f706678686e716367642f73637265656e73686f745f32303137303831315f3135303331332e706e67)

4. Additional Form Builder

    - Date Time Picker (htmltype = date or datetime)
    - Select2 (all select input will be select2)
    - HTML Text Editor (htmltype = textarea-rte)
    - File Uploder (htmltype = file-manager or album-manager)

5. Reusable Component

    - by Widget (Widget Class & Widget View) using arrilot/laravel-widgets for UI Component

        as much as possible the widget should have a loose coupled, bring data on the fly, avoid directly include / use in widget class

    - by Laravel Package

//------------------------------------------------#


## 3. Laravel Generator
### Perspective :

    HUMAN
    Interface       -   Tools (Worker)              -   Executor
    Commands\*      -   Common\* and Utils\*        -   Generators\* 
    
    COMPUTER
    Interface       -   Tools (Worker)              -   Executor
    Generators\*    -   Common\* and Utils\*        -   Commands\*    
    
### Guidance

1. To add HTML type definition, add and edit these :
    * add stub file in adminlte-templates\templates\scaffold\fields
    * add stub file in adminlte-templates\templates\vuejs\fields
    * edit Utils\HTMLFieldGenerator

    * edit Generators\ViewGenerator
    * edit Generators\VueJs\ViewGenerator

2. To add command, command option, or fields option
    * edit or add Common\\*
    * edit or add Commands\\* (BaseCommand, etc)
        
### Note

* Commands\\* : 
    
    use Common\CommandData, 
    use Utils\FileUtil,
    use Generator\\* 
    
    base Commands\BaseCommand

    - parsing console command
    - initializing commandData
    - execute Generators\\* to generating files and migrating database table

* Utils\GeneratorFieldsInputUtil : 
    
    use Common\GeneratorField

    - get fields specification from console command
    - return field specification by utilizing Common\GeneratorField

* Utils\HTMLFieldGenerator : 
    
    use Common\GeneratorField

    - return fieldTemplate will be used

* Common\GeneratorField : 

    - parsing parts of fields specification (db type, html input, option)
    - preparing migration

* Common\GeneratorConfig :
    
    - load, init and set config
    - get console command option

* Common\CommandData : 

    use Utils\GeneratorFieldsInputUtil,
    use Utils\TableFieldsGenerator
    
    - get and set commandData from config, file, and console

* Generators\\* : 

    use Utils\FileUtil,
    use Common\CommandData,
    use Utils\HTMLFieldGenerator in Generators\Scaffold\ViewGenerator
    
    base Generators\BaseGenerator

    - define generator functionality with data and template parameters to be used
    - define rollback


#
by dandi@redbuzz.co.id