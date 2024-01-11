<!-- brand Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
          <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
              <div class="mb-3">
                <select wire:model.defer="category_id" id="" class="form-select">
                  <option value="">--select category</option>
                  @forelse ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @empty
                     No Category 
                  @endforelse
                </select>
                @error('category_id') <span class="error">{{ $message }}</span> @enderror
              </div>
               <div class="mb-3">
                 <label for="">Brand Name</label>
                 <input type="text" wire:model.defer="name" class="form-control">
                 @error('name') <small class="text-danger">{{$message}}</small>  @enderror
               </div>
               <div class="mb-3">
                <label for="">Brand slug</label>
                <input type="text" wire:model.defer="slug" class="form-control">
                @error('slug') <small class="text-danger">{{$message}}</small>  @enderror
              </div>
              <div class="mb-3">
                <label for="">Status</label><br>
                <input type="checkbox" wire:model.defer="status" /> Checked= Hidden , Un-Checked= Visible
                @error('status') <small class="text-danger">{{$message}}</small>  @enderror
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
        </form>
      </div>
    </div>
  </div>

  <!--Update brand Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading.delay.longest class="p-2">
        <div class="d-flex justify-content-center">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
      
      <div wire:loading.remove>
            <form  wire:submit.prevent="updateBrand">
              <div class="modal-body">
                <div class="mb-3">
                  <select wire:model.defer="category_id" id="" class="form-select">
                    <option value="">--select category</option>
                    @forelse ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @empty
                       No Category 
                    @endforelse
                  </select>
                  @error('category_id') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                  <label for="">Brand Name</label>
                  <input type="text" wire:model.defer="name" class="form-control">
                  @error('name') <small class="text-danger">{{$message}}</small>  @enderror
                </div>
                <div class="mb-3">
                  <label for="">Brand slug</label>
                  <input type="text" wire:model.defer="slug" class="form-control">
                  @error('slug') <small class="text-danger">{{$message}}</small>  @enderror
                </div>
                <div class="mb-3">
                  <label for="">Status</label><br>
                  <input type="checkbox" wire:model.defer="status" /> Checked= Hidden , Un-Checked= Visible
                  @error('status') <small class="text-danger">{{$message}}</small>  @enderror
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
          </form>
      </div>
      
    </div>
  </div>
</div>

{{-- Delete brand Modal --}}
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Brands</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading.delay.longest class="p-2">
        <div class="d-flex justify-content-center">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
      
      <div wire:loading.remove>
            <form  wire:submit.prevent="destoryBrand">
                  <div class="modal-body">
                         <h4>Are you sure want to delete this data?</h4>
                  </div>
                <div class="modal-footer">
                  <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Yes. Delete</button>
                </div>
          </form>
      </div>
      
    </div>
  </div>
</div>


