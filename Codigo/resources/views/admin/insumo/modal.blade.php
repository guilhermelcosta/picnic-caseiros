<modal name="modal" aria-modal="true" class="v--modal-box v--modal vue-dialog">
    <div class="dialog-content">
        <div name= "modalTitle" class="dialog-c-title">@{{ item.descricao }}</div> <!-- se quiser, pode deixar assim, pq vai montar na função -->
        <div name = "modalText" class="dialog-c-text">@{{ item.observacao?.observacao ?? "" }}</div> <!-- se quiser, pode deixar assim, pq vai montar na função -->
    </div>
    <div class="vue-dialog-buttons">
        <button @click="hideModal()" type="button" class="vue-dialog-button">...</button>
    </div>
</modal>
