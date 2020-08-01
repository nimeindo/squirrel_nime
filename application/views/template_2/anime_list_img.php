<script type="0f54aedd23b3507947356e49-text/javascript">$(document).ready(function(){
        $(".navbar-toggler").click(function(){
            $(".mobile-menu").toggleClass("show-mobile-menu");
            $(".mainbody").toggleClass("no-scroll");
        });
        $(window).scroll(function(){if($(this).scrollTop()>100){$(".scrollToTop").fadeIn()}else{$(".scrollToTop").fadeOut()}});
        });
     </script> 
    <div class="content-body">
        <div class="fixed-spacing pd-btm-list">
            <section class="container container-1080 mt40 mb80 animelist">
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Manga List Image</h1>
                  </div>
                  <div class="col mt-3 mt-md-0">
                     <div class="mode_anime text-left text-md-right text-white"> 
                         <a href="?list=textmode"> Text Mode 
                             <i class="fas fa-toggle-on text-primary mx-2"></i> Image Mode 
                        </a>
                    </div>
                  </div>
               </div>
               <form class="filteranilist mb40" action="https://animeindo.fun/anime-list/" method="GET">
                  <div class="row thefilter">
                     <div class="d-none d-lg-block col-lg"> 
                         <a class="btn btn-block filterss text-white" data-toggle="collapse" href="#collapseGenre" role="button" aria-expanded="false" aria-controls="collapseGenre"> Toggle Genre <i class="fa fa-sort ml-2"></i> 
                        </a>
                    </div>
                     <div class="col-6 col-sm-4 col-md-4 col-lg mr-2 mr-sm-0">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="order">Sort by:</label></div>
                           <div class="col pl-0">
                              <select id="order" name="order">
                                 <option selected="selected" value="title">A-Z</option>
                                 <option value="titlereverse">Z-A</option>
                                 <option value="update">Latest Update</option>
                                 <option value="latest">Latest Added</option>
                                 <option value="popular">Popular</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-sm-4 col-md-4 col-lg">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="status">Status:</label></div>
                           <div class="col pl-0">
                              <select id="status" name="status">
                                 <option selected="selected" value="">All</option>
                                 <option value="Currently Airing">Currently Airing</option>
                                 <option value="Finished Airing">Finished Airing</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-sm-4 col-md-4 col-lg">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="type">Type:</label></div>
                           <div class="col pl-0">
                              <select id="type" name="type">
                                 <option selected="selected" value="">All</option>
                                 <option value="TV">TV</option>
                                 <option value="Movie">Movie</option>
                                 <option value="OVA">OVA</option>
                                 <option value="Special">Special</option>
                                 <option value="ONA">ONA</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-sm-4 col-md-4 col-lg">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="type">Row:</label></div>
                           <div class="col pl-0">
                              <select id="type" name="type">
                                 <option selected="selected" value="">10</option>
                                 <option value="50">50</option>
                                 <option value="100">100</option>
                                 <option value="150">200</option>
                                 <option value="200">300</option>
                                 <option value="200">400</option>
                                 <option value="500">500</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-sm-6 d-lg-none"> 
                         <a class="btn btn-block filterss text-white" data-toggle="collapse" href="#collapseGenre" role="button" aria-expanded="false" aria-controls="collapseGenre"> Toggle Genre <i class="fa fa-sort ml-2"></i> 
                        </a>
                    </div>
                     <div class="col-6 col-sm-6 col-lg"> 
                         <button type="submit" class="btn btn-block btn-primary">Filter</button>
                    </div>
                  </div>
                  <div class="collapse" id="collapseGenre">
                     <table width="100%">
                        <tbody>
                            <tr class="filter_tax">
                                <td class="filter_act"> 
                                    <label class="tax_fil">Action 
                                        <input type="checkbox" name="genre[]" value="action" /> 
                                        <span class="checkfil"></span> 
                                    </label>
                                    <label class="tax_fil">Action 
                                        <input type="checkbox" name="genre[]" value="action" /> 
                                        <span class="checkfil"></span> 
                                    </label>
                                </td>
                                
                            </tr>
                        </tbody>
                     </table>
                  </div>
               </form>
               <div class="row mt40">
                  <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-per5 mb40">
                        <a href="#">
                                <div class="episode-card">
                                    <div class="episode-ratio background-cover" style="" >
                                    <img  src="https://image.tmdb.org/t/p/w154/aLdnkOztHBbMAVyhNanJnykZKwp.jpg" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="Title">
                                        <div class="episode-detail px-3 pt-5">
                                            <div class="">
                                                <h5 class="text-white">Kitsutsuki Tanteidokoro</h5>
                                                <div class="ratingarea">
                                                  <span class="series-rating" style="background-size: 0% 100%">★★★★★</span>
                                                  <i class="score">8.48</i>
                                               </div>
                                            </div>
                                            <div class="status-type text-white"> 
                                                <span class="text-h6">
                                                <span class="text-h6">Adventure, Drama</span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>  
                     
                  </div>
                  
                  <div class="col-12 mb40 text-center">
                     <nav aria-label="Page navigation example">
                        
                        <div class="pagina">
                            <a  href="https://animeindo.fun/anime-list/page/2/"><i class="fas fa-chevron-left"></i> Prev
                            </a>
                            <a class ="pagina-active" href="https://animeindo.fun/anime-list/page/2/"> 1
                            </a>
                            <a href="https://animeindo.fun/anime-list/page/2/"> 2
                            </a>
                            <a href="https://animeindo.fun/anime-list/page/2/">Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                     </nav>
                  </div>
               </div>
            </section>
         </div>
    </div>