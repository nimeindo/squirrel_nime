<?php 
header('Content-type: application/xml; charset="ISO-8859-1"',true);  

?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" 
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach($API_ListAnime->API_TheMovieRs->Body->ListAnime as $ListAnime){ ?>
        <?php foreach($ListAnime->ListSubIndex as $ListSubIndex){ ?>
            <?php //$params = $ListSubIndex->IdDetailAnime.'-'.$ListSubIndex->SlugDetail;?>
            <?php $params = $ListSubIndex->SlugDetail;?>
            <url>	
                <loc><?php echo base_url().'anime/'.$params;?></loc>
                <lastmod><?php echo $ListSubIndex->PublishDate.'+00:00';?></lastmod>
            </url>
        <?php } ?>
    <?php } ?>
</urlset>