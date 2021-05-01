
<?php $this->_t ="Add A Retro Game"
?>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add A Retro Game</h1>
                    </div>
                    <form class="user" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="retroGameName" placeholder="Game Name" required>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control form-control-user" rows="3" placeholder="Game Description" name="retroGameDescription" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="picture">Retro game Picture</label>
                            <input class="form-control" id="picture" type="file" name="retroGamePicture" accept=".jpg,.png,.jpeg" required>
                        </div>

                        <div class="form-group">
                        <label for="gameFile">Retro game File</label>
                            <input class="form-control " type="file" name="retroGameFile" id="gameFile" required accept=".smc">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block" name="addRetroGame">Add retro game</button>
                        <hr>


                    </form>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>