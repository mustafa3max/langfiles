<?php

return [
    /**
     * Mapping elements to class names
     * For instance
     * 'p' => 'lead',
     * will give all <p> elements the class "lead"
     * <p class="lead">
     */
    'classes' => [
        'h1'     => 'text-3xl font-extrabold my-4',
        'h2'     => 'text-2xl font-extrabold my-4',
        'h3'     => 'text-xl font-extrabold my-4',
        'p'      => 'py-2',
        'ul'     => 'list-disc list-inside',
        'ul ul'  => 'ps-4 list-disc list-inside',
        'ol'     => 'list-decimal list-inside',
        'ol ol'  => 'ps-4 list-decimal list-inside',
        'pre'    => 'my-1 bg-primary-light dark:bg-primary-dark p-4 rounded-lg',
        'a'    => 'text-accent hover:underline',
    ],

    /**
     * Options for CommonMark parser
     * https://commonmark.thephpleague.com/2.3/configuration/
     */
    'commonmark' => [
        'renderer' => [
            'block_separator' => "\n",
            'inner_separator' => "\n",
            'soft_break'      => "\n",
        ],

        'commonmark' => [
            'enable_em'              => true,
            'enable_strong'          => true,
            'use_asterisk'           => true,
            'use_underscore'         => true,
            'unordered_list_markers' => ['-', '+', '*'],
        ],

        /*
        |--------------------------------------------------------------------------
        | HTML Input
        |--------------------------------------------------------------------------
        |
        | This option specifies how to handle untrusted HTML input.
        |
        | Default: 'strip'
        |
        */

        'html_input' => 'strip',

        /*
        |--------------------------------------------------------------------------
        | Allow Unsafe Links
        |--------------------------------------------------------------------------
        |
        | This option specifies whether to allow risky image URLs and links.
        |
        | Default: true
        |
        */

        'allow_unsafe_links' => true,

        /*
        |--------------------------------------------------------------------------
        | Maximum Nesting Level
        |--------------------------------------------------------------------------
        |
        | This option specifies the maximum permitted block nesting level.
        |
        | Default: PHP_INT_MAX
        |
        */

        'max_nesting_level' => PHP_INT_MAX,

        /*
        |--------------------------------------------------------------------------
        | Slug Normalizer
        |--------------------------------------------------------------------------
        |
        | This option specifies an array of options for slug normalization.
        |
        | Default: [
        |              'max_length' => 255,
        |              'unique' => 'document',
        |          ]
        |
        */

        'slug_normalizer' => [
            'max_length' => 255,
            'unique'     => 'document',
        ],
    ],

    /**
     * Extensions for commonmark
     * https://commonmark.thephpleague.com/2.3/extensions/overview/
     */
    'commonmark_extensions' => [
        League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension::class,
        League\CommonMark\Extension\ExternalLink\ExternalLinkExtension::class,
        //League\CommonMark\Extension\Autolink\AutolinkExtension::class,
        //League\CommonMark\Extension\Strikethrough\StrikethroughExtension::class,
    ],

    /**
     * It is possible to have code tags automatically
     * parsed and highlighted
     *
     * Remember to add the stylesheet to your page, if using this!
     * @markdomStyles()
     */
    'code_highlight' => [
        'enabled' => false,
        'theme' => 'default',
        'languages' => [
            'javascript',
            'php',
            'css',
        ],
    ],

    /**
     * This being enabled adds an id and an (invisible) anchor tag to configured elements
     */
    'links' => [
        'enabled' => true,

        /**
         * Here you can define which elements will receive id tags
         */
        'elements' => [
            'h2',
            'h3',
            'h4',
        ],

        /**
         * Set the delimiter to use when creating id and href slugs
         */
        'slug_delimiter' => '-',

        /**
         * Whether to add an achor tag
         */
        'add_anchor' => true,

        /**
         * Here you can define where the anchor shall be placed, possible values:
         * - before: the anchor tag will be placed right before the element
         *     - Example: <a name="foo"></a><h1>Foo</h1>
         * - after: the anchor tag will be placed right after the element
         *     - Example: <h1>Foo</h1><a name="foo"></a>
         * - wrap: the anchor tag will wrap the element
         *     - Example: <a name="foo"><h1>Foo</h1></a>
         * - wrapInner: the anchor tag will wrap the content inside the element
         *     - Example: <h1><a name="foo">Foo</a></h1>
         * - prepend: the anchor tag will be placed before the content of the element
         *     - Example: <h1><a name="foo"></a>Foo</h1>
         * - append: the anchor tag will be placed after the content of the element
         *     - Example: <h1>Foo<a name="foo"></a></h1>
         */
        'position' => 'before',
    ],
];
