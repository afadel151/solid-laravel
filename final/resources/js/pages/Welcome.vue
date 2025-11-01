<template>
  <div class="flex min-h-screen flex-col">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 border-b border-border bg-background/95 backdrop-blur-sm">
      <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2">
          <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-primary-foreground font-bold">
            S
          </div>
          <span class="text-xl font-bold text-foreground">Schedula</span>
        </div>
        <nav class="flex items-center justify-end gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="dashboard()"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="login()"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="register()"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                </template>
            </nav>
      </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex flex-1 flex-col">
      <section class="relative overflow-hidden bg-background px-4 py-24 sm:px-6 lg:px-8">
        <!-- Added gradient background element for more professional look -->
        <div class="absolute inset-0 -top-40 -right-40 h-96 w-96 rounded-full bg-primary/5 blur-3xl" />
        <div class="absolute inset-0 -bottom-40 -left-40 h-96 w-96 rounded-full bg-primary/10 blur-3xl" />
        
        <div class="mx-auto max-w-7xl relative z-10">
          <div class="grid gap-16 lg:grid-cols-2 lg:gap-8 items-center">
            <!-- Left: Content -->
            <div class="flex flex-col justify-center space-y-8">
              <div class="space-y-4">
                <div class="inline-flex items-center rounded-full border border-border bg-muted px-4 py-1.5">
                  <span class="text-xs font-medium text-muted-foreground">Welcome to Schedula</span>
                </div>
                <!-- Enhanced typography with better hierarchy -->
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-foreground text-balance leading-tight">
                  School Planning Reimagined
                </h1>
                <p class="text-lg sm:text-xl text-muted-foreground text-balance leading-relaxed">
                  Empower your institution with intelligent scheduling, comprehensive study plans, and seamless team collaboration. Built for modern educational leaders.
                </p>
              </div>

              <!-- Improved CTA buttons with better spacing and variants -->
              <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <nav class="flex items-center justify-end gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="dashboard()"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="login()"
                        class="inline-block  leading-normal "
                    >
                        <Button>
                        Log in
                        </Button>
                    </Link>
                </template>
            </nav>
                <Button 
                  size="lg" 
                  variant="outline" 
                  class="rounded-lg"
                  @click="scrollToFeatures"
                >
                  Explore features
                </Button>
              </div>

              <!-- Trust indicators -->
              <div class="pt-4 space-y-3">
                <p class="text-sm text-muted-foreground font-medium">Trusted by leading institutions</p>
                <div class="flex items-center gap-4">
                  <div class="h-10 w-24 rounded bg-muted/50 flex items-center justify-center text-xs text-muted-foreground">School A</div>
                  <div class="h-10 w-24 rounded bg-muted/50 flex items-center justify-center text-xs text-muted-foreground">School B</div>
                  <div class="h-10 w-24 rounded bg-muted/50 flex items-center justify-center text-xs text-muted-foreground">School C</div>
                </div>
              </div>
            </div>

            <!-- Right: Visual Hero Element -->
            <!-- Redesigned hero visual with professional dashboard-like card -->
            <div class="relative">
              <div class="rounded-2xl border border-border bg-gradient-to-br from-background via-muted/30 to-background p-8 shadow-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent" />
                
                <div class="relative space-y-6">
                  <!-- Header -->
                  <div class="flex items-center justify-between">
                    <div class="space-y-1">
                      <p class="text-xs font-medium text-muted-foreground uppercase tracking-wide">Today's Schedule</p>
                      <h3 class="text-lg font-semibold text-foreground">Monday, November 4th</h3>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary/10">
                      <Calendar class="h-5 w-5 text-primary" />
                    </div>
                  </div>

                  <!-- Schedule Items -->
                  <div class="space-y-3">
                    <!-- Schedule Item 1 -->
                    <div class="group rounded-lg border border-border bg-background/50 p-4 hover:border-primary/50 hover:bg-background transition-all duration-200">
                      <div class="flex items-start justify-between">
                        <div class="flex items-start gap-3 flex-1">
                          <div class="mt-1 flex h-2 w-2 rounded-full bg-primary flex-shrink-0" />
                          <div class="min-w-0">
                            <p class="text-sm font-semibold text-foreground">Mathematics - Grade 10</p>
                            <p class="text-xs text-muted-foreground">Room 201 · 50 students</p>
                          </div>
                        </div>
                        <div class="flex-shrink-0 text-right">
                          <p class="text-sm font-medium text-foreground">9:00 AM</p>
                          <p class="text-xs text-muted-foreground">1h 30m</p>
                        </div>
                      </div>
                    </div>

                    <!-- Schedule Item 2 -->
                    <div class="group rounded-lg border border-border bg-background/50 p-4 hover:border-primary/50 hover:bg-background transition-all duration-200">
                      <div class="flex items-start justify-between">
                        <div class="flex items-start gap-3 flex-1">
                          <div class="mt-1 flex h-2 w-2 rounded-full bg-blue-500 flex-shrink-0" />
                          <div class="min-w-0">
                            <p class="text-sm font-semibold text-foreground">Physics Lab - Grade 11</p>
                            <p class="text-xs text-muted-foreground">Lab A · 30 students</p>
                          </div>
                        </div>
                        <div class="flex-shrink-0 text-right">
                          <p class="text-sm font-medium text-foreground">11:00 AM</p>
                          <p class="text-xs text-muted-foreground">1h 30m</p>
                        </div>
                      </div>
                    </div>

                    <!-- Schedule Item 3 -->
                    <div class="group rounded-lg border border-border bg-background/50 p-4 hover:border-primary/50 hover:bg-background transition-all duration-200">
                      <div class="flex items-start justify-between">
                        <div class="flex items-start gap-3 flex-1">
                          <div class="mt-1 flex h-2 w-2 rounded-full bg-emerald-500 flex-shrink-0" />
                          <div class="min-w-0">
                            <p class="text-sm font-semibold text-foreground">English Literature</p>
                            <p class="text-xs text-muted-foreground">Room 105 · 35 students</p>
                          </div>
                        </div>
                        <div class="flex-shrink-0 text-right">
                          <p class="text-sm font-medium text-foreground">2:00 PM</p>
                          <p class="text-xs text-muted-foreground">1h 30m</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Footer -->
                  <div class="flex items-center justify-between border-t border-border pt-4">
                    <p class="text-xs text-muted-foreground">3 of 8 lectures scheduled</p>
                    <Button variant="ghost" size="sm" class="text-primary">
                      View all →
                    </Button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Features Section -->
      <section ref="featuresSection" class="border-t border-border bg-muted/30 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
          <div class="text-center space-y-4 mb-16">
            <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-foreground">
              Powerful features, designed for you
            </h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
              Everything you need to manage your school's academic operations efficiently
            </p>
          </div>

          <!-- Updated features grid with better card styling -->
          <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Feature 1 -->
            <div class="rounded-xl border border-border bg-background p-8 hover:border-primary/50 hover:shadow-md transition-all duration-200 group">
              <div class="mb-4 inline-flex rounded-lg bg-primary/10 p-3 group-hover:bg-primary/20 transition-colors">
                <Calendar class="h-6 w-6 text-primary" />
              </div>
              <h3 class="mb-2 text-lg font-semibold text-foreground">Smart Scheduling</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">
                Intelligent conflict detection and automated scheduling to optimize timetables effortlessly.
              </p>
            </div>

            <!-- Feature 2 -->
            <div class="rounded-xl border border-border bg-background p-8 hover:border-primary/50 hover:shadow-md transition-all duration-200 group">
              <div class="mb-4 inline-flex rounded-lg bg-primary/10 p-3 group-hover:bg-primary/20 transition-colors">
                <BookOpen class="h-6 w-6 text-primary" />
              </div>
              <h3 class="mb-2 text-lg font-semibold text-foreground">Study Plans</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">
                Create comprehensive curricula with learning objectives, resources, and assessments in one place.
              </p>
            </div>

            <!-- Feature 3 -->
            <div class="rounded-xl border border-border bg-background p-8 hover:border-primary/50 hover:shadow-md transition-all duration-200 group">
              <div class="mb-4 inline-flex rounded-lg bg-primary/10 p-3 group-hover:bg-primary/20 transition-colors">
                <Users class="h-6 w-6 text-primary" />
              </div>
              <h3 class="mb-2 text-lg font-semibold text-foreground">Team Collaboration</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">
                Bring faculty, administrators, and staff together in a unified workspace with real-time updates.
              </p>
            </div>

            <!-- Feature 4 -->
            <div class="rounded-xl border border-border bg-background p-8 hover:border-primary/50 hover:shadow-md transition-all duration-200 group">
              <div class="mb-4 inline-flex rounded-lg bg-primary/10 p-3 group-hover:bg-primary/20 transition-colors">
                <BarChart3 class="h-6 w-6 text-primary" />
              </div>
              <h3 class="mb-2 text-lg font-semibold text-foreground">Advanced Analytics</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">
                Gain actionable insights with detailed reports on scheduling efficiency and academic performance.
              </p>
            </div>

            <!-- Feature 5 -->
            <div class="rounded-xl border border-border bg-background p-8 hover:border-primary/50 hover:shadow-md transition-all duration-200 group">
              <div class="mb-4 inline-flex rounded-lg bg-primary/10 p-3 group-hover:bg-primary/20 transition-colors">
                <Lock class="h-6 w-6 text-primary" />
              </div>
              <h3 class="mb-2 text-lg font-semibold text-foreground">Enterprise Security</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">
                Bank-level encryption and role-based access control to protect sensitive institutional data.
              </p>
            </div>

            <!-- Feature 6 -->
            <div class="rounded-xl border border-border bg-background p-8 hover:border-primary/50 hover:shadow-md transition-all duration-200 group">
              <div class="mb-4 inline-flex rounded-lg bg-primary/10 p-3 group-hover:bg-primary/20 transition-colors">
                <Zap class="h-6 w-6 text-primary" />
              </div>
              <h3 class="mb-2 text-lg font-semibold text-foreground">Instant Notifications</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">
                Real-time alerts and synchronization across all devices keep everyone connected and informed.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="border-t border-border bg-gradient-to-b from-background to-muted/30 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center space-y-8">
          <div class="space-y-4">
            <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-foreground">
              Ready to transform your school?
            </h2>
            <p class="text-lg text-muted-foreground">
              Join educational leaders already revolutionizing their planning with Schedula. Start your free trial today.
            </p>
          </div>
          <!-- Improved CTA button styling -->
          <div class="flex flex-col gap-4 sm:flex-row sm:justify-center sm:items-center">
            <Button size="lg" to="/register" class="rounded-lg">
              Start free trial
            </Button>
            <Button size="lg" variant="outline" class="rounded-lg">
              Schedule a demo
            </Button>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-border bg-background px-4 py-12 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 md:grid-cols-4 mb-8">
          <div class="space-y-4">
            <div class="flex items-center gap-2">
              <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-primary-foreground font-bold">
                S
              </div>
              <span class="font-semibold text-foreground">Schedula</span>
            </div>
            <p class="text-sm text-muted-foreground">
              Transforming school management through intelligent planning.
            </p>
          </div>
          <div>
            <h4 class="font-semibold text-foreground mb-4 text-sm">Product</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Features</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Pricing</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Security</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Roadmap</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold text-foreground mb-4 text-sm">Company</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">About</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Blog</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Careers</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Contact</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold text-foreground mb-4 text-sm">Legal</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Privacy Policy</a></li>
              <li><a href="#" class="text-sm text-muted-foreground hover:text-foreground transition-colors">Terms of Service</a></li>
            </ul>
          </div>
        </div>
        <div class="border-t border-border pt-8">
          <p class="text-center text-sm text-muted-foreground">
            © 2025 Schedula. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import { 
  Calendar, 
  BookOpen, 
  Users, 
  BarChart3,
  Lock,
  Zap
} from 'lucide-vue-next'

const featuresSection = ref<HTMLElement | null>(null)

const scrollToFeatures = () => {
  featuresSection.value?.scrollIntoView({ behavior: 'smooth' })
}
</script>
