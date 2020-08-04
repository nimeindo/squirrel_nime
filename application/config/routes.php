<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/index';
$route['404_override'] = 'Controller404/index';
$route['translate_uri_dashes'] = FALSE;



$route['search'] = 'SearchHomeController/search';
$route['search/pages/(:any)-manga-(:any)-anime-(:any)'] = 'SearchHomeController/pages/$1/$2/$3';
$route['anime'] = 'Anime/AnimeController';
$route['anime/genre'] = 'Anime/AnimeGenreListController/genreList';
$route['anime/genre/search/(:any)'] = 'Anime/AnimeSearchGenreController/searchGenre/$1';
$route['anime/genre/search/(:any)/pages/(:any)'] = 'Anime/AnimeSearchGenreController/Pages/$1/$2';
$route['anime/genre/(:any)'] = 'Anime/AnimeGenreListController/genreList/$1';
$route['anime-streaming/(:any)'] = 'Anime/AnimeStreamingController/Streaming/$1';
$route['anime-search'] = 'Anime/AnimeSearchController/search';
$route['anime-search-ong'] = 'Anime/AnimeSearchController/searchOngoing';
$route['anime-search-ong/pages/(:any)-(:any)-(:any)'] = 'Anime/AnimeSearchController/Pages/$1/$2/$3';
$route['anime-search/pages/(:any)-(:any)-(:any)'] = 'Anime/AnimeSearchController/Pages/$1/$2/$3';
$route['anime-list'] = 'Anime/AnimeListController/animeList';
$route['anime-list/(:any)'] = 'Anime/AnimeListController/animeList/$1';
$route['anime-list/(:any)/pages/(:any)'] = 'Anime/AnimeListController/pages/$1/$2';
$route['anime-detail/des/(:any)'] = 'Anime/AnimeDetailController/detailAnime/$1';
$route['anime-update'] = 'Anime/AnimeUpdateController';
$route['anime-update/pages/(:any)'] = 'Anime/AnimeUpdateController/Pages/$1';
//========================khusus untuk backlink lama biar tidak error=========================
$route['streaming/(:any)'] = 'Anime/AnimeStreamingController/Streaming/$1'; 
$route['anime/(:any)'] = 'Anime/AnimeDetailController/detailAnime/$1';
//========================khusus untuk backlink lama biar tidak error=========================



$route['manga'] = 'Manga/MangaController';
$route['manga-read/(:any)'] = 'Manga/MangaReaderController/MangaRead/$1';
$route['manga-search'] = 'Manga/MangaSearchController/search';
$route['manga-search-ong'] = 'Manga/MangaSearchController/searchOngoing';
$route['manga-search-ong/pages/(:any)-(:any)-(:any)'] = 'Manga/MangaSearchController/Pages/$1/$2/$3';
$route['manga-search/pages/(:any)-(:any)-(:any)'] = 'Manga/MangaSearchController/Pages/$1/$2/$3';
$route['manga-detail/des/(:any)'] = 'Manga/MangaDetailController/description/$1';
$route['manga-detail/chap/(:any)'] = 'Manga/MangaDetailController/listChapter/$1';
$route['manga-update'] = 'Manga/MangaUpdateController';
$route['manga-update/pages/(:any)'] = 'Manga/MangaUpdateController/Pages/$1';
$route['manga-list/txt'] = 'Manga/MangaListController/mangaListTxt';
$route['manga-list/txt/(:any)'] = 'Manga/MangaListController/mangaListTxt/$1';
$route['manga-list/txt/(:any)/pages/(:any)'] = 'Manga/MangaListController/pagesTxt/$1/$2';
$route['manga-list/img'] = 'Manga/MangaListController/mangaListImg';
$route['manga-list/img/(:any)/pages/(:any)-(:any)'] = 'Manga/MangaListController/pagesImg/$1/$2/$3';
$route['manga/genre'] = 'Manga/MangaGenreListController/genreList';
$route['manga/genre/(:any)'] = 'Manga/MangaGenreListController/genreList/$1';
$route['manga/genre/search/(:any)'] = 'Manga/MangaSearchGenreController/searchGenre/$1';
$route['manga/genre/search/(:any)/pages/(:any)'] = 'Manga/MangaSearchGenreController/Pages/$1/$2';



$route['sitemap/anime\.xml'] = "Seo/SiteMap/anime";
$route['sitemap/anime/anime-pages-(:any)\.xml'] = "Seo/SiteMap/AnimePage/$1";
$route['sitemap/anime/list-anime-(:any)\.xml'] = "Seo/SiteMap/ListAnime/$1";

$route['sitemap/manga\.xml'] = "Seo/SiteMap/manga";
$route['sitemap/manga/manga-pages-(:any)\.xml'] = "Seo/SiteMap/MangaPage/$1";
$route['sitemap/manga/list-manga-(:any)\.xml'] = "Seo/SiteMap/ListManga/$1";

$route['sitemap/sitemap-menu\.xml'] = "Seo/SiteMap/sitemapMenu/$1";
$route['web/sitemap\.xml'] = "Seo/SiteMap/sitemap";

 