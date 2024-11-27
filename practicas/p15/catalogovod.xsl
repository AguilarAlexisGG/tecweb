<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>CATALOGO VOD</title>
                <style type="text/css">
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                    }
    
                    h2 {
                        margin-top: 20px;
                    }
    
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
    
                    th, td {
                        padding: 8px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;
                    }
    
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <img src="logo.png" style="display: block; margin: 20px auto 20px; width: 400px;" />
                <h2>Cuenta de usuario:</h2>
                <p>Correo: <xsl:value-of select="Catalogovod/cuenta/@correo"/></p>
                <p>Perfiles:
                    <xsl:for-each select="Catalogovod/cuenta/perfiles/perfil">
                        <xsl:value-of select="@usuario"/> (<xsl:value-of select="@idioma"/>),
                    </xsl:for-each>
                </p>
    
                <table border="1" cellpadding="5">
                    <tr>
                        <th>Título</th>
                        <th>Duración</th>
                        <th>Género</th>
                    </tr>
                    
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">Películas</td>
                    </tr>
    
                    <xsl:for-each select="Catalogovod/contenido/peliculas/genero/titulo">
                        <tr>
                            <td><xsl:value-of select="."/></td>
                            <td><xsl:value-of select="@duracion"/></td>
                            <td><xsl:value-of select="../../@nombre"/></td>
                        </tr>
                    </xsl:for-each>
    
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">Series</td>
                    </tr>
    
                    <xsl:for-each select="Catalogovod/contenido/series/genero/titulo">
                        <tr>
                            <td><xsl:value-of select="."/></td>
                            <td><xsl:value-of select="@duracion"/></td>
                            <td><xsl:value-of select="../../@nombre"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>