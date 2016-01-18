<?php
header( 'X-Robots-Tag: noindex, follow', true );
header( 'Content-Type: text/css' );

// Make the browser cache this file properly.
$expires = 60*60*24*365;
header( 'Pragma: public' );
header( 'Cache-Control: maxage=' . $expires );
header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', ( time() + $expires ) ) . ' GMT' );

$xsl = '<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
				xmlns:html="http://www.w3.org/TR/REC-html40"
				xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
				xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<title>Sitemap</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<style type="text/css">
                    body {
                        font-family: "Open Sans", Arial, sams-serif;
                    }
					table {
						border: none;
						border-collapse: collapse;
                        width: 100%;
					}
					#sitemap tr.odd td {
						background-color: #eee !important;
					}
					#sitemap tbody tr:hover td {
						background-color: #eee;
					}
					#sitemap tbody tr:hover td, #sitemap tbody tr:hover td a {
						color: #000;
					}
					#content {
						margin: 0 auto;
						width: 1000px;
					}
					a {
						color: #000;
						text-decoration: none;
					}
					a:visited {
						color: #777;
					}
					a:hover {
						text-decoration: underline;
					}
					th {
						text-align:left;
						padding-right:30px;
					}
					thead th {
						border-bottom: 1px solid #000;
						cursor: pointer;
					}
				</style>
			</head>
			<body>
				<div id="content">
					<xsl:if test="count(sitemap:sitemapindex/sitemap:sitemap) &gt; 0">
                        <h1>Sitemap Index</h1>
						<p>
							This XML Sitemap Index file contains <xsl:value-of select="count(sitemap:sitemapindex/sitemap:sitemap)"/> sitemaps.
						</p>
						<table id="sitemap" cellpadding="3">
							<thead>
								<tr>
									<th width="75%">Sitemap</th>
									<th width="25%">Last Modified</th>
								</tr>
							</thead>
							<tbody>
							<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
								<xsl:variable name="sitemapURL">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:variable>
								<tr>
									<td>
										<a href="{$sitemapURL}"><xsl:value-of select="sitemap:loc"/></a>
									</td>
									<td>
										<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(\' \', substring(sitemap:lastmod,12,5)))"/>
									</td>
								</tr>
							</xsl:for-each>
							</tbody>
						</table>
					</xsl:if>
					<xsl:if test="count(sitemap:sitemapindex/sitemap:sitemap) &lt; 1">
                        <h1>Sitemap Index</h1>
						<p>
							This XML Sitemap contains <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/> URLs.
						</p>
						<p><a href="javascript:history.back(-1);">&lt; Back</a></p>
						<table id="sitemap" cellpadding="3">
							<thead>
								<tr>
									<th width="75%">URL</th>
									<th title="Index Priority" width="5%">Prio</th>
									<th title="Change Frequency" width="5%">Ch. Freq.</th>
									<th title="Last Modification Time" width="15%">Last Mod.</th>
								</tr>
							</thead>
							<tbody>
								<xsl:variable name="lower" select="\'abcdefghijklmnopqrstuvwxyz\'"/>
								<xsl:variable name="upper" select="\'ABCDEFGHIJKLMNOPQRSTUVWXYZ\'"/>
								<xsl:for-each select="sitemap:urlset/sitemap:url">
									<tr>
										<td>
											<xsl:variable name="itemURL">
												<xsl:value-of select="sitemap:loc"/>
											</xsl:variable>
											<a href="{$itemURL}">
												<xsl:value-of select="sitemap:loc"/>
											</a>
										</td>
										<td>
											<xsl:value-of select="concat(sitemap:priority*100,\'%\')"/>
										</td>
										<td>
											<xsl:value-of select="concat(translate(substring(sitemap:changefreq, 1, 1),concat($lower, $upper),concat($upper, $lower)),substring(sitemap:changefreq, 2))"/>
										</td>
										<td>
											<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(\' \', substring(sitemap:lastmod,12,5)))"/>
										</td>
									</tr>
								</xsl:for-each>
							</tbody>
						</table>
					</xsl:if>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>';
echo $xsl;
