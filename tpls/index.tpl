{include file="tpls/haut.tpl"}

<!-- About Section -->
<section>
    <div class="container">
        <div class="row">
            <form action="message.php" method="POST" enctype="multipart/form-data">
                <div class="col-sm-6">
                    <div class="form-group">
                         <input type="hidden" name="id" value="{$id}"/>
                        <textarea id="message" name="message" class="form-control" value="{$message}"></textarea>
                         <input type="text" name="user" class="form-control" style="width: 150px; margin-top: 8px" placeholder="Utilisateur">
                    </div>
                </div>

                 <div class="col-sm-4 ">
                    <label for="image">Select an image</label>
                    <input type="file" name="image" id="image" />
                 </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-lg" >Envoyer</button>
                </div>       
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <div class="col-md-12">
                    {foreach $all_data as $data}
                <blockquote>
                    <p>
                        <!--on verifie si l'image existe-->
                        <!--{if $data.img}
                        <img src="./data/images/{$data.img}.jpg" alt="une image e-learning" width="15%" style=" float:left margin-left:15px" />
                        {/if}-->
                        <img src="./data/images/{$data.id}.jpg" alt="une image e-learning" width="15%" style="float:left" />
                        
                        {$data.contenu|escape|nl2br}
                        
                    </p>
                    <a href="index.php?id={$data.id}" class="btn btn-info"> Modifier</a>
                    <a href="suppression.php?id={$data.id}" class="btn btn-danger">Supprimer</a>
                    <a href="#" data-id="{$data.id}" class="btn btn-primary buttonVote">Vote</a><small class="text-muted nbreVote"> Nombre de vote : 12<p>{$data.date_ajout}</p></small>
                </blockquote>
                {/foreach}
            </div>
        </div>
    </div>

    <!--Pagination -->
    <div>
    <nav>
        <ul class="pagination pagination-lg">
            <li><a href="?p={$pageAnt}">&laquo;</a></li>
            {for $i=1 to $nbpage}
                <li class="{$pageCourant}"><a href="?p={$i}">{$i}</a></li>
            {/for}
            <li><a href="?p={$pageSuiv}">&raquo;</a></li>
        </ul>
    </nav>
    </div>
</section>


{include file="tpls/bas.tpl"}
{literal}
<script src="../js/mainIndex.js"></script>
{/literal}