<div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>







                     <div class="col-md-3">
                                                    <div class="position-relative form-group">
                                                       <label class="">Estado</label>
                                                       <select type="select" name="selectEstado" class="custom-select">
                                          <option>Selecione o Estado</option>
                                          <?php 
                                             $resultEstado = "SELECT * FROM estado";
                                             $resultadoEstado = mysqli_query($conn, $resultEstado);
                                             while($rowEstado = mysqli_fetch_assoc($resultadoEstado)) { ?>

                                                <option value="<?php echo $rowEstado['idEstado']; ?>"><?php echo $rowEstado['nome'];?>
                                                </option><?php 
                                            }
                                          ?>
                                      </select>
                                                      </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="position-relative form-group"><label class="">País</label>
                                                    <select type="select" name="selectPais" class="custom-select">
                                          <option>Selecione o País</option>
                                          <?php 
                                             $resultPais = "SELECT * FROM pais";
                                             $resultadoPais = mysqli_query($conn, $resultPais);
                                             while($rowPais = mysqli_fetch_assoc($resultadoPais)) { ?>

                                                <option value="<?php echo $rowPais['idPais']; ?>"><?php echo $rowPais['nome'];?>
                                                </option><?php 
                                            }
                                          ?>
                                      </select>
                                                   </div>
                                                </div>
                                            </div> 