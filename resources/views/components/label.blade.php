<label class="mb-2 block text-sm font-medium text-slate-900"
  for="{{ $for }}">
  {{ $slot }} 
  @if ($required)
    <span class="text-red-600 font-bold -ml-0.5">*</span>
  @endif
</label>