<?php
                     $sql2 = mysqli_query($conn, "SELECT * FROM produto ORDER BY idProduto;");

                     while ($produto = mysqli_fetch_object($sql2)){ ?>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <?php echo "<img src='../fotos/".$produto->foto."' alt='Foto de exibição' /><br />";?>

                                <?php echo " <h2>R$ " . $produto->preco . "</h2>";?>
                                 
                                 <?php echo "" . $produto->nome . "";?>
                                 
                                 <a href="../Blog/detalhesProduto.php" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <?php } ?>

