import { Link, usePage } from '@inertiajs/react';
import {
    LayoutDashboard,
    GraduationCap,
    BookOpen,
    Clock,
    DoorOpen,
    Users,
    UserCheck,
    CalendarDays,
    Building2,
    ShieldCheck,
} from 'lucide-react';
import AppLogo from '@/components/app-logo';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarGroup,
    SidebarGroupLabel,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { useCurrentUrl } from '@/hooks/use-current-url';
import type { Auth } from '@/types';

export function AppSidebar() {
    const { isCurrentUrl } = useCurrentUrl();
    const page = usePage<{ auth: Auth }>();
    const user = page.props.auth?.user;

    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent className="gap-2">
                {/* 1. Panel Principal */}
                <SidebarGroup className="px-2 py-0">
                    <SidebarGroupLabel className="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">
                        Principal
                    </SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/dashboard')}
                                tooltip={{ children: 'Dashboard' }}
                            >
                                <Link href="/dashboard" prefetch>
                                    <LayoutDashboard className="size-4 text-primary" />
                                    <span className="font-medium">Dashboard</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>

                {/* 2. Matrícula y Procesos */}
                <SidebarGroup className="px-2 py-0">
                    <SidebarGroupLabel className="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">
                        Proceso de Matrícula
                    </SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/matriculas')}
                                tooltip={{ children: 'Matrículas' }}
                            >
                                <Link href="/matriculas">
                                    <GraduationCap className="size-4 text-primary" />
                                    <span className="font-medium">Matrículas</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>

                {/* 3. Gestión Académica */}
                <SidebarGroup className="px-2 py-0">
                    <SidebarGroupLabel className="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">
                        Académico
                    </SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/cursos')}
                                tooltip={{ children: 'Cursos y Prerrequisitos' }}
                            >
                                <Link href="/cursos">
                                    <BookOpen className="size-4 text-primary" />
                                    <span>Cursos y Malla</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/grupos')}
                                tooltip={{ children: 'Grupos y Cupos' }}
                            >
                                <Link href="/grupos">
                                    <Building2 className="size-4 text-primary" />
                                    <span>Grupos Aperturados</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/horarios')}
                                tooltip={{ children: 'Horarios de Clases' }}
                            >
                                <Link href="/horarios">
                                    <Clock className="size-4 text-primary" />
                                    <span>Horarios</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/aulas')}
                                tooltip={{ children: 'Aulas y Pabellones' }}
                            >
                                <Link href="/aulas">
                                    <DoorOpen className="size-4 text-primary" />
                                    <span>Aulas</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>

                {/* 4. Comunidad Universitaria */}
                <SidebarGroup className="px-2 py-0">
                    <SidebarGroupLabel className="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">
                        Comunidad UNS
                    </SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/estudiantes')}
                                tooltip={{ children: 'Estudiantes' }}
                            >
                                <Link href="/estudiantes">
                                    <Users className="size-4 text-primary" />
                                    <span>Estudiantes</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/docentes')}
                                tooltip={{ children: 'Docentes' }}
                            >
                                <Link href="/docentes">
                                    <UserCheck className="size-4 text-primary" />
                                    <span>Docentes</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>

                {/* 5. Administración y Configuración */}
                <SidebarGroup className="px-2 py-0">
                    <SidebarGroupLabel className="text-[11px] font-semibold text-muted-foreground uppercase tracking-wider">
                        Configuración
                    </SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/carreras')}
                                tooltip={{ children: 'Escuelas Profesionales' }}
                            >
                                <Link href="/carreras">
                                    <ShieldCheck className="size-4 text-primary" />
                                    <span>Escuelas / Carreras</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl('/semestres-academicos')}
                                tooltip={{ children: 'Semestres Académicos' }}
                            >
                                <Link href="/semestres-academicos">
                                    <CalendarDays className="size-4 text-primary" />
                                    <span>Semestres Académicos</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>
            </SidebarContent>

            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
