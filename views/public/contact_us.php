<?php
/**
 * Contact Us Page Template — Faithfully matching https://earthousing.com/contact-us
 * Supports Gleamrealty Multi-Theme Engine (Green & White, Dark-Yellow, Blue & White)
 */
?>

<?php
    $c = $contact ?? \App\Models\Setting::getContactSections();
    $heroCover = !empty($c['hero']['image']) ? media_url($c['hero']['image']) : (!empty($page['hero_media_url']) ? media_url($page['hero_media_url']) : asset('uploads/hero/hero-braj-sanctuary.webp'));
    $heroHeading = !empty($c['hero']['heading']) ? $c['hero']['heading'] : (!empty($page['hero_heading']) ? $page['hero_heading'] : ($page['title'] ?? 'Contact us'));
    $heroSubheading = !empty($c['hero']['subheading']) ? $c['hero']['subheading'] : (!empty($page['hero_subheading']) ? $page['hero_subheading'] : 'Contact us for details about plots and luxury villas in Vrindavan and Mathura. Our specialized advisory team is here to assist your sacred journey.');
    $heroBadge = !empty($c['hero']['badge']) ? $c['hero']['badge'] : 'Gleamrealty Private Limited • Vrindavan & Mathura';
?>

<!-- Inner Header / Banner -->
<section class="relative min-h-[35vh] sm:min-h-[42vh] flex items-center justify-center border-b border-stone-800 bg-stone-950 py-20 lg:py-28 overflow-hidden transition-colors">
    <!-- Subtle Background Media & Cinematic Scrim -->
    <div class="absolute inset-0 z-0">
        <img src="<?= $heroCover ?>"
             alt="<?= e($heroHeading) ?>"
             class="w-full h-full object-cover filter brightness-[0.35] blur-[1px] scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-black/30"></div>
    </div>

    <!-- Ambient Heritage Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] rounded-full blur-3xl pointer-events-none -z-0 opacity-25"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-3" style="margin-top:15px;">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-white/10 text-white border border-white/20 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-[#9A6B2F] animate-ping"></span>
            <?= e($heroBadge) ?>
        </div>

        <h1 class="font-editorial text-4xl sm:text-6xl font-normal tracking-tight text-white drop-shadow-md">
            <?= e($heroHeading) ?>
        </h1>

        <p class="text-xs sm:text-sm max-w-xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow">
            <?= e($heroSubheading) ?>
        </p>

        <?php if (\Core\Auth::check()): ?>
            <div class="pt-2 flex items-center justify-center gap-3">
                <a href="<?= url('/admin/contact') ?>"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-semibold bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-md transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Contact Page in Admin CMS
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Main Contact Section (Two-Column Layout Matching Earthousing) -->
<section class="relative py-20 sm:py-24 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

        <!-- Left Column: Find your Dream Property Form -->
        <div class="lg:col-span-7"
             x-data="{
                submitting: false,
                submitted: false,
                errorMessage: '',
                form: {
                    name: '',
                    mobile: '',
                    email: '',
                    state: '',
                    message: ''
                },
                submitForm() {
                    this.submitting = true;
                    this.errorMessage = '';
                    fetch('<?= url('/api/inquiry') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.form)
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.submitting = false;
                        if (data.status === 'success') {
                            this.submitted = true;
                            this.form = { name: '', mobile: '', email: '', state: '', message: '' };
                        } else {
                            this.errorMessage = data.message || 'Unable to submit enquiry. Please try again.';
                        }
                    })
                    .catch(err => {
                        this.submitting = false;
                        this.errorMessage = 'Network error. Please try again or contact us via WhatsApp.';
                    });
                }
             }">

            <div class="p-8 sm:p-10 rounded-3xl border shadow-xl transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                
                <!-- Form Header -->
                <div class="mb-8">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider mb-3 transition-colors"
                          :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                        </svg>
                        <?= e($c['form']['eyebrow'] ?? '✦ Instant Response Guarantee') ?>
                    </span>
                    <h2 class="font-editorial text-3xl sm:text-4xl font-normal tracking-tight transition-colors"
                        :style="{ color: 'var(--theme-title)' }">
                        <?= e($c['form']['title'] ?? 'Find your Dream Property') ?>
                    </h2>
                    <p class="text-xs sm:text-sm font-light mt-2 transition-colors"
                       :style="{ color: 'var(--theme-subtitle)' }">
                        <?= e($c['form']['subtitle'] ?? 'Fill in your details below and our senior property advisor will connect with you within 30 minutes.') ?>
                    </p>
                </div>

                <!-- Success Alert -->
                <div x-show="submitted"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="mb-6 p-4 rounded-xl bg-[#FDF3E3] border border-[#9A6B2F]/30 text-[#9A6B2F] text-xs sm:text-sm flex items-start justify-between gap-3">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-[#9A6B2F] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <strong>Success!</strong> Your enquiry submitted successfully! Our team will contact you shortly.
                        </div>
                    </div>
                    <button @click="submitted = false" class="text-[#9A6B2F] hover:text-[#835722]">&times;</button>
                </div>

                <!-- Error Alert -->
                <div x-show="errorMessage"
                     x-transition
                     class="mb-6 p-4 rounded-xl bg-red-500/15 border border-red-500/30 text-red-800 dark:text-red-200 text-xs sm:text-sm flex items-center justify-between">
                    <span x-text="errorMessage"></span>
                    <button @click="errorMessage = ''" class="text-red-600 hover:text-red-800">&times;</button>
                </div>

                <!-- Interactive Form -->
                <form @submit.prevent="submitForm()" class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5"
                                   :style="{ color: 'var(--theme-subtitle)' }">Full Name <span class="text-red-500">*</span></label>
                            <input type="text"
                                   x-model="form.name"
                                   required
                                   placeholder="Full Name"
                                   class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2"
                                   :style="{
                                       backgroundColor: 'var(--theme-bg-canvas)',
                                       borderColor: 'var(--theme-card-border)',
                                       color: 'var(--theme-text-primary)'
                                   }">
                        </div>

                        <!-- Mobile No. -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5"
                                   :style="{ color: 'var(--theme-subtitle)' }">Mobile No. <span class="text-red-500">*</span></label>
                            <input type="tel"
                                   x-model="form.mobile"
                                   required
                                   placeholder="Mobile No."
                                   pattern="[0-9]{10}"
                                   title="Please enter a 10-digit mobile number"
                                   class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2"
                                   :style="{
                                       backgroundColor: 'var(--theme-bg-canvas)',
                                       borderColor: 'var(--theme-card-border)',
                                       color: 'var(--theme-text-primary)'
                                   }">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Email Address -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5"
                                   :style="{ color: 'var(--theme-subtitle)' }">Email Address <span class="text-red-500">*</span></label>
                            <input type="email"
                                   x-model="form.email"
                                   required
                                   placeholder="Email Address"
                                   class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2"
                                   :style="{
                                       backgroundColor: 'var(--theme-bg-canvas)',
                                       borderColor: 'var(--theme-card-border)',
                                       color: 'var(--theme-text-primary)'
                                   }">
                        </div>

                        <!-- Select State -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5"
                                   :style="{ color: 'var(--theme-subtitle)' }">Select State <span class="text-red-500">*</span></label>
                            <select x-model="form.state"
                                    required
                                    class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2 cursor-pointer"
                                    :style="{
                                        backgroundColor: 'var(--theme-bg-canvas)',
                                        borderColor: 'var(--theme-card-border)',
                                        color: 'var(--theme-text-primary)'
                                    }">
                                <option value="">Select state</option>
                                <option>Uttar Pradesh</option>
                                <option>Delhi</option>
                                <option>Haryana</option>
                                <option>Rajasthan</option>
                                <option>Maharashtra</option>
                                <option>Gujarat</option>
                                <option>Madhya Pradesh</option>
                                <option>Bihar</option>
                                <option>Punjab</option>
                                <option>Uttarakhand</option>
                                <option>West Bengal</option>
                                <option>Andaman and Nicobar Islands</option>
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Chandigarh</option>
                                <option>Chhattisgarh</option>
                                <option>Dadra and Nagar Haveli</option>
                                <option>Daman and Diu</option>
                                <option>Goa</option>
                                <option>Himachal Pradesh</option>
                                <option>Jammu and Kashmir</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kerala</option>
                                <option>Ladakh</option>
                                <option>Lakshadweep</option>
                                <option>Manipur</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Pondicherry</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Telangana</option>
                                <option>Tripura</option>
                            </select>
                        </div>
                    </div>

                    <!-- Your Message -->
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5"
                               :style="{ color: 'var(--theme-subtitle)' }">Your Message</label>
                        <textarea x-model="form.message"
                                  rows="4"
                                  placeholder="Your Message (e.g. Inquiring for residential plots in Vrindavan or duplex villas...)"
                                  class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2 resize-y"
                                  :style="{
                                      backgroundColor: 'var(--theme-bg-canvas)',
                                      borderColor: 'var(--theme-card-border)',
                                      color: 'var(--theme-text-primary)'
                                  }"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                :disabled="submitting"
                                class="w-full py-4 rounded-xl text-xs sm:text-sm uppercase tracking-[0.16em] font-bold transition-all duration-300 shadow-md hover:shadow-xl active:scale-98 flex items-center justify-center gap-2"
                                :style="{
                                    backgroundColor: 'var(--theme-btn-pri-bg)',
                                    color: 'var(--theme-btn-pri-text)'
                                }">
                            <template x-if="submitting">
                                <svg class="animate-spin h-4 w-4 text-current" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                            </template>
                            <span x-text="submitting ? 'Submitting Enquiry...' : '<?= e(addslashes($c['form']['button_text'] ?? 'Submit Enquiry')) ?>'">Submit Enquiry</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Right Column: Advisory Office Presence & Contact Details -->
        <div class="lg:col-span-5 space-y-6">
            <!-- Office Card -->
            <div class="p-8 sm:p-10 rounded-3xl border shadow-xl transition-all relative overflow-hidden"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                
                <span class="text-[10px] uppercase tracking-[0.24em] font-semibold block mb-2"
                      :style="{ color: 'var(--theme-accent)' }">
                    <?= e($c['office']['badge'] ?? '✦ Registered & Site Presence') ?>
                </span>
                <h3 class="font-editorial text-2xl sm:text-3xl font-normal mb-6"
                    :style="{ color: 'var(--theme-title)' }">
                    <?= e($c['office']['title'] ?? 'Vrindavan Gleamrealty Private Limited') ?>
                </h3>

                <div class="space-y-6 text-xs sm:text-sm font-light">
                    <!-- Address -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 border"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-xs uppercase tracking-wider mb-0.5" :style="{ color: 'var(--theme-title)' }">Office Address</div>
                            <p class="leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                                <a href="<?= e(company_map_directions_url()) ?>" target="_blank" rel="noopener noreferrer" class="hover:underline hover:opacity-90">
                                    <?= e(company_address()) ?>
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Telephone -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 border"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-xs uppercase tracking-wider mb-0.5" :style="{ color: 'var(--theme-title)' }">Advisory Hotline</div>
                            <div class="space-y-1">
                                <?php if (!empty($c['office']['phone_1'])): ?>
                                    <a href="tel:<?= preg_replace('/\s+/', '', $c['office']['phone_1']) ?>" class="font-medium hover:underline text-sm sm:text-base block" :style="{ color: 'var(--theme-title)' }">
                                        <?= e($c['office']['phone_1']) ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($c['office']['phone_2'])): ?>
                                    <a href="tel:<?= preg_replace('/\s+/', '', $c['office']['phone_2']) ?>" class="font-medium hover:underline text-sm sm:text-base block" :style="{ color: 'var(--theme-title)' }">
                                        <?= e($c['office']['phone_2']) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 border bg-[#FAF7F2] border-[#9A6B2F]/20 text-[#9A6B2F]">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.23c-.25-.13-1.47-.72-1.7-.81-.23-.08-.4-.13-.57.13-.17.25-.65.81-.8 1-.15.17-.3.19-.55.07-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.12-.15.17-.25.25-.42.08-.17.04-.32-.02-.44-.06-.13-.57-1.37-.78-1.88-.2-.5-.42-.43-.57-.44h-.49c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.45 1.03 2.62.13.17 1.78 2.72 4.31 3.81.6.26 1.07.42 1.44.54.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-xs uppercase tracking-wider mb-0.5" :style="{ color: 'var(--theme-title)' }">WhatsApp Concierge</div>
                            <?php $waNum = preg_replace('/[^0-9]/', '', $c['office']['whatsapp'] ?? '919871731303'); ?>
                            <a href="https://wa.me/<?= $waNum ?>?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20plots%20and%20villas%20in%20Vrindavan."
                               target="_blank"
                               rel="noopener"
                               class="font-medium hover:underline text-sm sm:text-base text-[#9A6B2F] block">
                                <?= e($c['office']['whatsapp'] ?? '+91 9871731303') ?>
                            </a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 border"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-xs uppercase tracking-wider mb-0.5" :style="{ color: 'var(--theme-title)' }">Email Address</div>
                            <a href="mailto:<?= e($c['office']['email'] ?? 'contact@gleamrealty.com') ?>" class="font-medium hover:underline text-xs sm:text-sm block" :style="{ color: 'var(--theme-title)' }">
                                <?= e($c['office']['email'] ?? 'contact@gleamrealty.com') ?>
                            </a>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="pt-4 border-t" :style="{ borderColor: 'var(--theme-card-border)' }">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-semibold uppercase tracking-wider" :style="{ color: 'var(--theme-title)' }">Hours:</span>
                            <span :style="{ color: 'var(--theme-subtitle)' }"><?= e($c['office']['hours'] ?? 'Mon – Sun: 9:30 AM – 7:30 PM') ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Trust Banner -->
            <div class="p-6 rounded-2xl border flex items-center justify-around text-center"
                 :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                <?php 
                    $badges = $c['trust_badges'] ?? [
                        ['val' => '100%', 'label' => 'MVDA Approved'],
                        ['val' => 'Freehold', 'label' => 'Direct Registry'],
                        ['val' => '0%', 'label' => 'Brokerage'],
                    ];
                ?>
                <?php foreach ($badges as $idx => $b): ?>
                    <?php if ($idx > 0): ?>
                        <div class="w-px h-8 bg-black/10 dark:bg-white/10"></div>
                    <?php endif; ?>
                    <div>
                        <span class="block font-serif text-xl font-bold" :style="{ color: 'var(--theme-title)' }"><?= e($b['val'] ?? '') ?></span>
                        <span class="text-[10px] uppercase tracking-wider font-semibold opacity-80" :style="{ color: 'var(--theme-subtitle)' }"><?= e($b['label'] ?? '') ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<?php 
    $editorialContent = !empty($c['editorial']['content']) ? $c['editorial']['content'] : (!empty($page['content']) && !str_contains($page['content'], 'Earthousing') ? $page['content'] : '');
    $editorialTitle = !empty($c['editorial']['title']) ? $c['editorial']['title'] : 'About Our Advisory';
?>
<?php if (!empty($editorialContent)): ?>
<!-- Dynamic Editorial Content (Managed from Admin -> Contact Us Content CMS) -->
<section class="py-14 px-6 sm:px-8 border-t transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-5xl mx-auto">
        <div class="p-8 sm:p-12 rounded-3xl border shadow-xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
            <span class="text-xs uppercase tracking-widest font-semibold block mb-3" :style="{ color: 'var(--theme-accent)' }">
                <?= e($editorialTitle) ?>
            </span>
            <div class="prose prose-stone dark:prose-invert max-w-none text-sm sm:text-base leading-relaxed"
                 :style="{ color: 'var(--theme-text-primary)' }">
                <?= $editorialContent ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Full-Width Interactive Google Maps Embed -->
<section class="relative w-full border-t border-b overflow-hidden"
         :style="{ borderColor: 'var(--theme-border-hairline)' }">
    <div class="w-full h-[460px] relative bg-stone-100 dark:bg-stone-900">
        <!-- Floating Presence Overlay -->
        <div class="absolute top-6 left-6 z-10 hidden sm:flex items-center gap-3 px-5 py-3 rounded-2xl shadow-xl backdrop-blur-md border transition-all"
             :style="{
                 backgroundColor: 'var(--theme-card-bg)',
                 borderColor: 'var(--theme-card-border)',
                 boxShadow: 'var(--theme-card-shadow)'
             }">
            <div class="w-3 h-3 rounded-full bg-[#9A6B2F] animate-ping"></div>
            <div>
                <span class="block text-xs font-semibold uppercase tracking-wider" :style="{ color: 'var(--theme-title)' }">
                    <?= e($c['map']['title'] ?? 'GLEAMREALTY PRIVATE LIMITED • Suncity Anantam Kunj') ?>
                </span>
                <span class="block text-[11px]" :style="{ color: 'var(--theme-subtitle)' }">
                    <?= e($c['office']['address'] ?? company_address()) ?>
                </span>
            </div>
            <a href="<?= e($c['map']['directions_url'] ?? company_map_directions_url()) ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="ml-3 px-3 py-1.5 rounded-lg text-xs font-semibold tracking-wide border transition-all hover:scale-105 inline-flex items-center gap-1.5"
               :style="{
                   backgroundColor: 'var(--theme-btn-pri-bg)',
                   color: 'var(--theme-btn-pri-text)',
                   borderColor: 'transparent'
               }">
                <span>Directions</span>
                <svg class="w-3 h-3 fill-current" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                </svg>
            </a>
        </div>

        <iframe
            src="<?= e($c['map']['embed_url'] ?? company_map_embed_url()) ?>"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="<?= e($c['map']['title'] ?? 'GLEAMREALTY PRIVATE LIMITED Location') ?> - <?= e($c['office']['address'] ?? company_address()) ?>">
        </iframe>
    </div>
</section>

