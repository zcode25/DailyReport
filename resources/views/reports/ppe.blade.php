<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Report') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('report.ppe.save', ['report' => $report->reportId]) }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">PPE Form</h2>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Helm</span>
                            <input type="hidden" name="helm" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('helm') input-error @enderror" id="helm" name="helm" value="1" {{ old('helm') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('helm')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Uniform</span>
                            <input type="hidden" name="uniform" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('uniform') input-error @enderror" id="uniform" name="uniform" value="1" {{ old('uniform') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('uniform')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Vest</span>
                            <input type="hidden" name="vest" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('vest') input-error @enderror" id="vest" name="vest" value="1" {{ old('vest') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('vest')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Safety Shoes</span>
                            <input type="hidden" name="safetyShoes" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('safetyShoes') input-error @enderror" id="safetyShoes" name="safetyShoes" value="1" {{ old('safetyShoes') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('safetyShoes')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Safety Goggles</span>
                            <input type="hidden" name="safetyGoggles" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('safetyGoggles') input-error @enderror" id="safetyGoggles" name="safetyGoggles" value="1" {{ old('safetyGoggles') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('safetyGoggles')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Glove</span>
                            <input type="hidden" name="glove" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('glove') input-error @enderror" id="glove" name="glove" value="1" {{ old('glove') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('glove')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Safety Mask</span>
                            <input type="hidden" name="safetyMask" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('safetyMask') input-error @enderror" id="safetyMask" name="safetyMask" value="1" {{ old('safetyMask') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('safetyMask')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-5">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Ear Plug</span>
                            <input type="hidden" name="earPlug" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('earPlug') input-error @enderror" id="earPlug" name="earPlug" value="1" {{ old('earPlug') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('earPlug')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-row content-center">
                      <div class="basis-1/2">
                          <a href="{{ route('project.index') }}" class="btn btn-ghost">Back</a>
                      </div>
                      <div class="basis-1/2 text-end">
                          <button class="btn btn-primary text-white">Submit</button>
                      </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
