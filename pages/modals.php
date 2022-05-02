<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLongTitle"></h5>
      </div>
      <div id="infoModalBody" class="modal-body">
      </div>
      <div class="modal-footer">
        <button act="" id="infoModalButton" type="button" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLongTitle">Koszyk</h5>
            </div>
            <div id="cartModalBody" class="modal-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Ilość</th>
                        <th scope="col">Cena</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody></tbody>
                </table>

                <span>Łączna cena: </span>
                <label id="cart-sum-price"></label>
            </div>
            <div class="modal-footer">
                <button act="" id="cart-make-order" type="button" class="btn btn-primary">Zamów</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="noProductModal" tabindex="-1" role="dialog" aria-labelledby="noProductCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noProductLongTitle">Brak towaru w magazynie!</h5>
            </div>
            <div class="modal-footer">
                <button act="" id="noProductModalButton" type="button" onclick='$("#noProductModal").modal("hide");' class="btn btn-danger">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="infoItemModal" tabindex="-1" role="dialog" aria-labelledby="infoItemModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoItemModalLongTitle"></h5>
            </div>
            <div id="infoModalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button act="" id="infoItemModalButton" type="button" class="btn btn-primary"></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detModal" tabindex="-1" role="dialog" aria-labelledby="detModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detModalLongTitle"></h5>
            </div>
            <div id="detModalBody" class="modal-body">
                <p id="detModalType"></p>
                <p id="detModalDesc"></p>
            </div>
            <div class="modal-footer">
                <input id="detModalInput" type="number" value="1" min="1" max="5" id="pt-q" style="margin-top: 4px; width: 50px" />
                <button act="" id="detModalButton" type="button" class="btn btn-primary">Oceń</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detUsrModal" tabindex="-1" role="dialog" aria-labelledby="detUsrModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detUsrModalLongTitle"></h5>
            </div>
            <div id="detUsrModalBody" class="modal-body">
                <p id="detUsrModalType"></p>
                <p id="detUsrModalDesc"></p>
            </div>
            <div class="modal-footer">
                <input id="detUsrModalInput" type="number" value="1" min="1" max="5" id="pt-q" style="margin-top: 4px; width: 50px" />
                <button act="" id="detUsrModalButton" type="button" class="btn btn-primary">Oceń</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oDetModal" tabindex="-1" role="dialog" aria-labelledby="oDetCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="oDetLongTitle"></h5>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Produkt</th>
                        <th scope="col">Ilość</th>
                    </tr>
                    </thead>
                    <tbody id="oDetBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rapModal" tabindex="-1" role="dialog" aria-labelledby="rapModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rapModalLongTitle">
                    <input id="rap-title" type="text" value="Tytuł">
                </h5>
            </div>
            <div id="rapModalBody" class="modal-body">
                <textarea id="rap-content" rows="7" cols="47">Treść raportu</textarea>
            </div>
            <div class="modal-footer">
                <button uid="<?php print($_SESSION['id']) ?>" id="rapModalButton" type="button" class="btn btn-primary">Wyślij</button>
            </div>
        </div>
    </div>
</div>