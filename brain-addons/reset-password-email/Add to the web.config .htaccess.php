add this in your web.config

<rule name="Imported Rule User Pass" stopProcessing="true">
	<match url="newpassword/([a-zA-Z0-9_-]+)(|/)$" ignoreCase="false" />
	<action type="Rewrite" url="/index.php?url=newpassword&amp;key={R:1}" appendQueryString="false" />
</rule>

add this in your htaccess

RewriteRule ^newpassword/([a-zA-Z0-9_-]+)(|/)$ index.php?url=newpassword&key=$1