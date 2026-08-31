import { Head, Link, usePage } from '@inertiajs/react';
import {
    GraduationCap,
    Users,
    BookOpen,
    Building2,
    Calendar,
    Clock,
    PlusCircle,
    ArrowUpRight,
    School,
    BookCheck,
    Sparkles,
} from 'lucide-react';
import type { Auth, BreadcrumbItem } from '@/types';

interface DashboardStats {
    total_estudiantes: number;
    total_docentes: number;
    total_cursos: number;
    total_carreras: number;
    total_grupos: number;
    total_aulas: number;
    total_matriculas: number;
    semestre_actual: {
        id: number;
        nombre: string;
        fecha_inicio: string;
        fecha_fin: string;
    } | null;
}

interface UltimaMatricula {
    id: number;
    estudiante: string;
    carrera: string;
    semestre: string;
    fecha: string;
    estado: string;
}

interface DashboardProps {
    stats: DashboardStats;
    ultimasMatriculas: UltimaMatricula[];
}

export default function Dashboard({ stats, ultimasMatriculas = [] }: DashboardProps) {
    const { auth } = usePage<{ auth: Auth }>().props;
    const user = auth.user;

    const getEstadoBadge = (estado: string) => {
        switch (estado) {
            case 'Activa':
                return 'bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border-emerald-500/20';
            case 'Anulada':
                return 'bg-rose-500/10 text-rose-700 dark:text-rose-400 border-rose-500/20';
            case 'Finalizada':
                return 'bg-blue-500/10 text-blue-700 dark:text-blue-400 border-blue-500/20';
            default:
                return 'bg-neutral-500/10 text-neutral-700 dark:text-neutral-400 border-neutral-500/20';
        }
    };

    return (
        <>
            <Head title="Dashboard - SIIGAA UNS" />

            <div className="w-full max-w-7xl mx-auto flex flex-col gap-6 p-4 sm:p-6 lg:p-8">
                {/* 1. Header Institucional / Banner Rojo y Blanco de la UNS */}
                <div className="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#6b0000] via-[#8b0000] to-[#a81616] p-6 text-white shadow-xl sm:p-8 border border-red-800/40">
                    <div className="absolute right-0 top-0 -mt-10 -mr-10 h-72 w-72 rounded-full bg-white/10 blur-3xl pointer-events-none" />
                    <div className="absolute right-32 bottom-0 -mb-10 h-44 w-44 rounded-full bg-red-400/20 blur-2xl pointer-events-none" />

                    <div className="relative z-10 flex flex-col justify-between gap-6 md:flex-row md:items-center">
                        <div className="flex items-center gap-5">
                            {/* Escudo Oficial UNS en el Banner */}
                            <div className="hidden sm:flex shrink-0 size-20 items-center justify-center rounded-2xl bg-white p-2 shadow-md ring-2 ring-white/30">
                                <img
                                    src="/images/logo-uns.png"
                                    alt="Escudo UNS"
                                    className="size-full object-contain"
                                />
                            </div>

                            <div className="space-y-1.5">
                                <div className="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-semibold backdrop-blur-md border border-white/20">
                                    <Sparkles className="size-3.5 text-white" />
                                    <span>Portal Institucional SIIGAA — UNS</span>
                                </div>
                                <h1 className="text-2xl font-black tracking-tight sm:text-3xl lg:text-4xl text-white">
                                    ¡Bienvenido(a), {user?.name}!
                                </h1>
                                <p className="text-sm text-red-100 max-w-xl leading-relaxed">
                                    Sistema Integrado de Información y Gestión Académica de la <strong className="text-white">Universidad Nacional del Santa</strong>.
                                </p>
                            </div>
                        </div>

                        {/* Semestre Activo Tag */}
                        {stats.semestre_actual && (
                            <div className="flex flex-col rounded-xl bg-white/10 p-4.5 backdrop-blur-md border border-white/20 shadow-sm min-w-[220px]">
                                <span className="text-[11px] uppercase tracking-wider font-extrabold text-white/80">
                                    Semestre Académico
                                </span>
                                <span className="text-2xl font-black tracking-tight text-white mt-0.5">
                                    {stats.semestre_actual.nombre}
                                </span>
                                <span className="text-xs text-red-100 mt-1 flex items-center gap-1.5 font-medium">
                                    <span className="size-2 rounded-full bg-emerald-400 animate-pulse" />
                                    Semestre Vigente
                                </span>
                            </div>
                        )}
                    </div>
                </div>

                {/* 2. Métricas y Estadísticas Principales */}
                <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    {/* Estudiantes */}
                    <div className="rounded-xl border bg-card p-5 shadow-xs transition hover:shadow-md hover:border-primary/40">
                        <div className="flex items-center justify-between">
                            <span className="text-sm font-semibold text-muted-foreground">Estudiantes</span>
                            <div className="flex size-10 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                <Users className="size-5" />
                            </div>
                        </div>
                        <div className="mt-3">
                            <div className="text-2xl font-black tracking-tight text-foreground">
                                {stats.total_estudiantes}
                            </div>
                            <p className="text-xs text-muted-foreground mt-1 font-medium">
                                Registrados en la universidad
                            </p>
                        </div>
                    </div>

                    {/* Matrículas */}
                    <div className="rounded-xl border bg-card p-5 shadow-xs transition hover:shadow-md hover:border-primary/40">
                        <div className="flex items-center justify-between">
                            <span className="text-sm font-semibold text-muted-foreground">Matrículas</span>
                            <div className="flex size-10 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                <GraduationCap className="size-5" />
                            </div>
                        </div>
                        <div className="mt-3">
                            <div className="text-2xl font-black tracking-tight text-foreground">
                                {stats.total_matriculas}
                            </div>
                            <p className="text-xs text-muted-foreground mt-1 font-medium">
                                En el semestre en curso
                            </p>
                        </div>
                    </div>

                    {/* Cursos */}
                    <div className="rounded-xl border bg-card p-5 shadow-xs transition hover:shadow-md hover:border-primary/40">
                        <div className="flex items-center justify-between">
                            <span className="text-sm font-semibold text-muted-foreground">Cursos en Malla</span>
                            <div className="flex size-10 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                <BookOpen className="size-5" />
                            </div>
                        </div>
                        <div className="mt-3">
                            <div className="text-2xl font-black tracking-tight text-foreground">
                                {stats.total_cursos}
                            </div>
                            <p className="text-xs text-muted-foreground mt-1 font-medium">
                                En {stats.total_carreras} escuelas profesionales
                            </p>
                        </div>
                    </div>

                    {/* Grupos Aperturados */}
                    <div className="rounded-xl border bg-card p-5 shadow-xs transition hover:shadow-md hover:border-primary/40">
                        <div className="flex items-center justify-between">
                            <span className="text-sm font-semibold text-muted-foreground">Grupos y Cupos</span>
                            <div className="flex size-10 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                <Building2 className="size-5" />
                            </div>
                        </div>
                        <div className="mt-3">
                            <div className="text-2xl font-black tracking-tight text-foreground">
                                {stats.total_grupos}
                            </div>
                            <p className="text-xs text-muted-foreground mt-1 font-medium">
                                Distribuidos en {stats.total_aulas} aulas
                            </p>
                        </div>
                    </div>
                </div>

                {/* 3. Accesos Rápidos y Actividad */}
                <div className="grid gap-6 lg:grid-cols-3">
                    {/* Accesos Rápidos */}
                    <div className="rounded-xl border bg-card p-6 shadow-xs lg:col-span-1">
                        <h2 className="text-base font-bold text-foreground">Acciones Académicas</h2>
                        <p className="text-xs text-muted-foreground mt-0.5 font-medium">Accesos directos del SIIGAA UNS</p>

                        <div className="mt-4 flex flex-col gap-2.5">
                            <Link
                                href="/matriculas/create"
                                className="group flex items-center justify-between rounded-lg border border-border p-3.5 transition hover:border-primary hover:bg-red-50/50 dark:hover:bg-red-950/20"
                            >
                                <div className="flex items-center gap-3">
                                    <div className="flex size-9 items-center justify-center rounded-lg bg-primary text-primary-foreground shadow-xs">
                                        <PlusCircle className="size-4.5" />
                                    </div>
                                    <div>
                                        <div className="text-sm font-semibold text-foreground group-hover:text-primary">
                                            Nueva Matrícula
                                        </div>
                                        <div className="text-xs text-muted-foreground">Inscripción y selección de cursos</div>
                                    </div>
                                </div>
                                <ArrowUpRight className="size-4 text-muted-foreground group-hover:text-primary transition" />
                            </Link>

                            <Link
                                href="/horarios"
                                className="group flex items-center justify-between rounded-lg border border-border p-3.5 transition hover:border-primary hover:bg-red-50/50 dark:hover:bg-red-950/20"
                            >
                                <div className="flex items-center gap-3">
                                    <div className="flex size-9 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                        <Clock className="size-4.5" />
                                    </div>
                                    <div>
                                        <div className="text-sm font-semibold text-foreground group-hover:text-primary">
                                            Consultar Horarios
                                        </div>
                                        <div className="text-xs text-muted-foreground">Distribución semanal de clases</div>
                                    </div>
                                </div>
                                <ArrowUpRight className="size-4 text-muted-foreground group-hover:text-primary transition" />
                            </Link>

                            <Link
                                href="/grupos"
                                className="group flex items-center justify-between rounded-lg border border-border p-3.5 transition hover:border-primary hover:bg-red-50/50 dark:hover:bg-red-950/20"
                            >
                                <div className="flex items-center gap-3">
                                    <div className="flex size-9 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                        <School className="size-4.5" />
                                    </div>
                                    <div>
                                        <div className="text-sm font-semibold text-foreground group-hover:text-primary">
                                            Grupos y Cupos
                                        </div>
                                        <div className="text-xs text-muted-foreground">Capacidades, aulas y docentes</div>
                                    </div>
                                </div>
                                <ArrowUpRight className="size-4 text-muted-foreground group-hover:text-primary transition" />
                            </Link>

                            <Link
                                href="/cursos"
                                className="group flex items-center justify-between rounded-lg border border-border p-3.5 transition hover:border-primary hover:bg-red-50/50 dark:hover:bg-red-950/20"
                            >
                                <div className="flex items-center gap-3">
                                    <div className="flex size-9 items-center justify-center rounded-lg bg-red-500/10 text-primary">
                                        <BookCheck className="size-4.5" />
                                    </div>
                                    <div>
                                        <div className="text-sm font-semibold text-foreground group-hover:text-primary">
                                            Cursos y Prerrequisitos
                                        </div>
                                        <div className="text-xs text-muted-foreground">Mallas curriculares por carrera</div>
                                    </div>
                                </div>
                                <ArrowUpRight className="size-4 text-muted-foreground group-hover:text-primary transition" />
                            </Link>
                        </div>
                    </div>

                    {/* Tabla de Últimas Matrículas */}
                    <div className="rounded-xl border bg-card p-6 shadow-xs lg:col-span-2">
                        <div className="flex items-center justify-between mb-4">
                            <div>
                                <h2 className="text-base font-bold text-foreground">Últimas Matrículas Registradas</h2>
                                <p className="text-xs text-muted-foreground mt-0.5 font-medium">Inscripciones registradas en el sistema</p>
                            </div>
                            <Link
                                href="/matriculas"
                                className="inline-flex items-center gap-1 text-xs font-bold text-primary hover:underline"
                            >
                                Ver todas
                                <ArrowUpRight className="size-3" />
                            </Link>
                        </div>

                        {ultimasMatriculas.length === 0 ? (
                            <div className="flex flex-col items-center justify-center py-12 text-center">
                                <GraduationCap className="size-12 text-muted-foreground/40 mb-2" />
                                <p className="text-sm font-medium text-muted-foreground">No hay matrículas registradas aún</p>
                                <Link
                                    href="/matriculas/create"
                                    className="mt-3 inline-flex items-center gap-1.5 rounded-lg bg-primary px-3 py-1.5 text-xs font-semibold text-primary-foreground hover:bg-primary/90"
                                >
                                    <PlusCircle className="size-3.5" />
                                    Crear primera matrícula
                                </Link>
                            </div>
                        ) : (
                            <div className="overflow-x-auto">
                                <table className="w-full text-left text-xs">
                                    <thead>
                                        <tr className="border-b border-border text-muted-foreground">
                                            <th className="pb-2.5 font-bold">ID</th>
                                            <th className="pb-2.5 font-bold">Estudiante</th>
                                            <th className="pb-2.5 font-bold">Carrera</th>
                                            <th className="pb-2.5 font-bold">Semestre</th>
                                            <th className="pb-2.5 font-bold">Fecha</th>
                                            <th className="pb-2.5 font-bold">Estado</th>
                                            <th className="pb-2.5 text-right font-bold">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-border">
                                        {ultimasMatriculas.map((mat) => (
                                            <tr key={mat.id} className="hover:bg-muted/40 transition">
                                                <td className="py-3 font-mono font-bold text-primary">#{mat.id}</td>
                                                <td className="py-3 font-semibold text-foreground">{mat.estudiante}</td>
                                                <td className="py-3 text-muted-foreground">{mat.carrera}</td>
                                                <td className="py-3 text-muted-foreground">{mat.semestre}</td>
                                                <td className="py-3 text-muted-foreground">{mat.fecha}</td>
                                                <td className="py-3">
                                                    <span className={`inline-flex items-center rounded-full border px-2 py-0.5 text-[10px] font-extrabold ${getEstadoBadge(mat.estado)}`}>
                                                        {mat.estado}
                                                    </span>
                                                </td>
                                                <td className="py-3 text-right">
                                                    <Link
                                                        href={`/matriculas/${mat.id}`}
                                                        className="font-bold text-primary hover:underline"
                                                    >
                                                        Detalles
                                                    </Link>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </>
    );
}

Dashboard.layout = {
    breadcrumbs: [
        {
            title: 'Dashboard',
            href: '/dashboard',
        },
    ] as BreadcrumbItem[],
};
