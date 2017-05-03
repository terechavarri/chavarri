# Diseño y Nuevos Medios

### Optativo de Profundización / Diseño / UC

#### 3 de mayo, 2017

**MÓDULO 4: Introducción a la programación de scripts del lado del servidor con PHP**

Para esta clase **deben tener instalado [MAMP](https://www.mamp.info/en/) en sus computadores**. Ese programa nos permite montar un servidor local, para trabajar con **Apache** (servidor HTTP), **MySQL** (sistema de gestión de bases de datos) y **PHP** (lenguaje de programación).

Antes de empezar a trabajar, debemos tener claro que [PHP](http://php.net/) es un lenguaje de código abierto centrado en la programación de [scripts del lado del servidor](https://es.wikipedia.org/wiki/Script_del_lado_del_servidor), esto significa que el [cliente](https://es.wikipedia.org/wiki/Cliente_(inform%C3%A1tica)) no recibe sino un resultado ya ejecutado en el otro lado. La opción de "ver código fuente" nunca mostrará lenguaje PHP; la única pista la tendremos en la barra de direcciones de nuestro navegador, donde no habrá un `*.html` sino un `*.php`. Esta extensión fue el primer elemento que consideró el servidor para "poner manos a la obra". 

**Para insistir en el punto:** Si es que necesitas compartir alguna solución con PHP vía web, tendrías que ocupar servicios como los de [codepad](http://codepad.org/), porque, a diferencia de lo que hemos trabajado con HTML, CSS y JavaScript, **PHP no aparece al "ver el código fuente"**.

Las páginas web que usan extensión `*.php` se pueden crear de la misma manera que normalmente se crean páginas `*.html`: trabajando con cualquier editor de código. Pero en este trabajo tenemos que usar etiquetas de apertura y cierre particulares, que son `<?php` y `?>`. Las instrucciones que estén entre estas etiquetas serán filtradas e interpretadas en el [servidor](https://es.wikipedia.org/wiki/Servidor).

Entre `<?php` y `?>` se pueden escribir una o varias instrucciones. Si se escriben varias, éstas deben separarse mediante punto y coma `;`.

Entre las instrucciones podemos aprovechar las funciones internas (incluídas) de PHP; es muy dificil que exista alguien capaz de aprender de memoria todas las `funciones()` que ofrece este lenguaje de programación, pero en el [sitio oficial de PHP](http://php.net/manual/es/langref.php), y en [varios lugares más](http://stackoverflow.com/questions/tagged/php), se puede encontrar mucha ayuda.
