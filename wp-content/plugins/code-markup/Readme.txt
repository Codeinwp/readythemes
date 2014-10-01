=== Code Markup ===
Contributors: bennettmcelwee
Tags: code,markup,format,java,html.xml,c++
Requires at least: 1.5
Tested up to: 2.5
Stable tag: 1.3

Code Markup is a WordPress plugin that makes it easy to include program code samples in your posts.

== Description ==

Code Markup is a WordPress plugin that makes it easy to include program code samples in your posts. You can even include HTML markup in the code sample; Code Markup magically knows which characters should be displayed as code and which should be rendered as HTML.

The plugin works by escaping most special HTML tags and characters so they display exactly as typed, but leaving certain ones alone so they will render as normal HTML. The default set of allowed tags is the standard formatting tags like em, strong, span and so on. You can control this explicitly, or implicitly by specifying the language of the code block. For example, in a normal code block, &lt;em&gt; will be rendered as emphasised text, but in an HTML code block, &lt;em&gt; will be displayed as &lt;em&gt;.

(I have to use square brackets instead of angle brackets because of the WordPress Extend site formatting.)

USAGE

1. Enclose any code inside a &lt;code&gt; block.

2. Use &lt;code markup="..." lang="..."&gt; to specify appearance of code.
    * Include any HTML markup you like in the code, for example to add emphasis to certain sections.
    * Separate &lt;code&gt; blocks should be nested within a &lt;pre&gt; block to preserve whitespace.

3. If you want to fine-tune how Code Markup treats your code, use the markup and lang attributes on the code tag to specify how Code Markup should handle it.
    * &lt;code&gt; or &lt;code markup="default"&gt; allows common HTML tags to be rendered, and displays everything else exactly as written.
    * &lt;code markup="none"&gt; displays content exactly as written — no markup is rendered.
    * &lt;code markup="all"&gt; renders content as HTML — all markup is rendered.
    * &lt;code markup="em strong a"&gt; treats &lt;em&gt;, &lt;strong&gt; and &lt;a&gt; tags as HTML markup — everything else is displayed exactly as written. You can put whatever tags you like in the markup attribute, separated by spaces. As a special case, you can include the comment tag — this means that HTML comments &lt;!-- like this --&gt; will be “rendered” as normal HTML comments (i.e. not displayed).
    * &lt;code lang="html"&gt; or &lt;code lang="xhtml"&gt; displays content exactly as written, the same as &lt;code markup="none"&gt;.

4. The markup attribute overrides the lang attribute.

5. Separate &lt;code&gt; blocks should be nested within a &lt;pre&gt; block to
   preserve whitespace.


== Installation ==

1. Copy code-markup.php into your WordPress plugins directory (wp-content/plugins).
2. Log in to WordPress Admin. Go to the Plugins page and click Activate for Code Markup.
3. Go to the Options page and click Writing. Make sure "WordPress should correct invalidly nested XHTML automatically" is NOT checked. (Otherwise it may do funny things to your code listings.)


== Frequently Asked Questions ==


= What is this good for? =

The plugin allows you to quickly copy and paste code into your blog, and add HTML markup to it to emphasise certain parts of it. Normally this is not possible without a lot of fiddly manual editing.

= what tags are allowed by default? =

If the code block has its lang attribute set to html or xhtml, then no tags are allowed: all tags are escaped and will display as typed. Otherwise the following tags are allowed: em strong b i ins del a span

= How do I change the default behaviour? =

To make the code block render as straight HTML, set the code block's "markup" attribute to "all". In this case, make sure that you have typed correct HTML!

To make the code block display exactly as typed, set the code block's "markup" attribute to "none".

To allow the default tags to be rendered as HTML, even in HTML code, set the code block's "markup" attribute to "default".