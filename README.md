# Mbiz_OptionSystemCode

This module allows you to add a "system code" to every option.

It is really useful if you want to display an option a different way.

Example:

```html
<?php if ($_option->getSystemCode() === 'my-code'): ?>
<p>This option is special.</p>
<?php endif; ?>
```

These "system codes" SHOULD be defined with your team.

It also can be used to identify an option with ease, to perform some operations by example:

```php
switch ($option->getSystemCode()) {
	case 'my-code':
    	// TODO
        break;
    case 'my-other-code':
    	// TODO
        break;
}
```