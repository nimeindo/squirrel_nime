
<?php 
header('Content-type: application/xml; charset="ISO-8859-1"',true);  
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" 
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>	
        <loc><?php echo base_url();?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s').'+00:00'?></lastmod>
    </url>
    <url>	
        <loc><?php echo base_url().'anime-ongoing';?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s').'+00:00'?></lastmod>
    </url>
    <url>	
        <loc><?php echo base_url().'list-anime';?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s').'+00:00'?></lastmod>
    </url>
    <url>	
        <loc><?php echo base_url().'genre';?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s').'+00:00'?></lastmod>
    </url>
    <url>	
        <loc><?php echo base_url().'pusat-bantuan';?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s').'+00:00'?></lastmod>
    </url>
</urlset>