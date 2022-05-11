# ext-ds-reflection

This repo is to showcase a bug in `ext-ds`. The bug consist in that Ds won't report consistent reflection information when comparing usage via polyfill and extension.

To replicate the bug:

1. Enable/Install Ds extension
2. Run `php reflection.class.php`
3. You will get an empty string:

```sh
^ []
```

When using Ds via extension there won't be the same reflection behavior.

Expected behavior:

1. Disable Ds extension (`php -m | grep ds` should return empty)
2. Run `php reflection.class.php`
3. You will get the object properties:

```sh
^ array:2 [
  0 => ReflectionProperty {#5
    +name: "pairs"
    +class: "Ds\Map"
    modifiers: "private"
    extra: {
      docComment: """
        /**\n
             * @var array internal array to store pairs\n
             *\n
             * @psalm-var array<int, Pair>\n
             */
        """
    }
  }
  1 => ReflectionProperty {#6
    +name: "capacity"
    +class: "Ds\Map"
    modifiers: "private"
    extra: {
      docComment: """
        /**\n
             * @var int internal capacity\n
             */
        """
    }
  }
]
```

## Affected systems

Tested on Ubuntu 22.04, you can refer to the [test-poly.yml](.github/workflows/test-poly.yml) and [test-ext.yml](.github/workflows/test-ext.yml) workflows.
