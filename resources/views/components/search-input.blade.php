@props([
  'searchTerm' => ''
])

<div class="d-flex justify-content-center align-items-center border bg-white pr-2">
  <input {{ $attributes }} type="text" class="form-control border-0" placeholder="بحث">
  <span class="fas fa-times-circle{{ ($searchTerm == '') ? ' d-none' : '' }}" style="cursor: pointer;" wire:click='clearSearch'></span>
</div>