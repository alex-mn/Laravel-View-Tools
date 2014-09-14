Laravel-View-Tools
==================

Additional features for managing Views

**Compatibility**
Tested with Laravel 4.2

**Instalation**

Current version contains:

PHP to JS JSON
--
Converts PHP variables and arrays to JS JSON object and injects it into the selected view automatically under the set
namespace.

**Usage**

```
View::make('name/of/the/view')->withJs($variable);
```