USE [master]
GO
/****** Object:  Database [activos_csa]    Script Date: 22/10/2024 17:00:42 ******/
CREATE DATABASE [activos_csa]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'activos_csa', FILENAME = N'E:\ruben.guancollo\Desktop\bd\activos_csa.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'activos_csa_log', FILENAME = N'E:\ruben.guancollo\Desktop\bd\activos_csa_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [activos_csa] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [activos_csa].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [activos_csa] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [activos_csa] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [activos_csa] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [activos_csa] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [activos_csa] SET ARITHABORT OFF 
GO
ALTER DATABASE [activos_csa] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [activos_csa] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [activos_csa] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [activos_csa] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [activos_csa] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [activos_csa] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [activos_csa] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [activos_csa] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [activos_csa] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [activos_csa] SET  DISABLE_BROKER 
GO
ALTER DATABASE [activos_csa] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [activos_csa] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [activos_csa] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [activos_csa] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [activos_csa] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [activos_csa] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [activos_csa] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [activos_csa] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [activos_csa] SET  MULTI_USER 
GO
ALTER DATABASE [activos_csa] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [activos_csa] SET DB_CHAINING OFF 
GO
ALTER DATABASE [activos_csa] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [activos_csa] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [activos_csa] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [activos_csa] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [activos_csa] SET QUERY_STORE = ON
GO
ALTER DATABASE [activos_csa] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [activos_csa]
GO
/****** Object:  User [soporte]    Script Date: 22/10/2024 17:00:43 ******/
CREATE USER [soporte] FOR LOGIN [soporte] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [soporte]
GO
/****** Object:  Table [dbo].[activo]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[activo](
	[id_activo] [int] IDENTITY(1,1) NOT NULL,
	[id_grupo_contable] [int] NOT NULL,
	[cod_subgrupo] [text] NOT NULL,
	[nombre] [text] NOT NULL,
	[codigo_activo] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_activo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[area]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[area](
	[id_area] [int] IDENTITY(1,1) NOT NULL,
	[id_departamento] [int] NOT NULL,
	[codigo_area] [int] NOT NULL,
	[nom_area] [text] NOT NULL,
	[ubicacion_area] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_area] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[asignacion_activos]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[asignacion_activos](
	[id_asignacion_activos] [int] IDENTITY(1,1) NOT NULL,
	[id_registro_individual] [int] NOT NULL,
	[id_usuario_asig] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[numero] [int] NULL,
	[observaciones] [text] NULL,
	[fecha_asignacion] [date] NOT NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_asignacion_activos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[baja_activos]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[baja_activos](
	[id_baja_activos] [int] IDENTITY(1,1) NOT NULL,
	[id_registro_individual] [int] NOT NULL,
	[id_motivo] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[observaciones] [text] NULL,
	[fecha_baja] [date] NOT NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_baja_activos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cargo]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cargo](
	[id_cargo] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_cargo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[departamentos]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[departamentos](
	[id_departamento] [int] IDENTITY(1,1) NOT NULL,
	[codigo_departamento] [int] NOT NULL,
	[nom_departamento] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_departamento] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[depresiacion]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[depresiacion](
	[id_depresiacion] [int] IDENTITY(1,1) NOT NULL,
	[id_registro_individual] [int] NOT NULL,
	[id_estado_activo] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[val_actual] [float] NULL,
	[observaciones] [text] NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_depresiacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[devolucion_activos]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[devolucion_activos](
	[id_devolucion_activos] [int] IDENTITY(1,1) NOT NULL,
	[id_registro_individual] [int] NOT NULL,
	[id_usuario_dev] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[observaciones] [text] NULL,
	[fecha_dev] [date] NOT NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_devolucion_activos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[empresas]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[empresas](
	[id_empresa] [int] IDENTITY(1,1) NOT NULL,
	[nit] [text] NOT NULL,
	[empresa] [text] NOT NULL,
	[direccion] [text] NOT NULL,
	[telefonos] [text] NOT NULL,
	[correo] [text] NOT NULL,
	[contacto] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_empresa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[estado_activo]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[estado_activo](
	[id_estado_activo] [int] IDENTITY(1,1) NOT NULL,
	[est_tec] [text] NOT NULL,
	[descripcion] [text] NOT NULL,
	[observaciones] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_estado_activo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[grupo_contable]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[grupo_contable](
	[id_grupo_contable] [int] IDENTITY(1,1) NOT NULL,
	[cod_contable] [text] NOT NULL,
	[cod_resumen] [text] NOT NULL,
	[descripcion] [text] NOT NULL,
	[vida_util] [int] NULL,
	[depcoef] [float] NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_grupo_contable] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[motivo_baja]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[motivo_baja](
	[id_motivo] [int] IDENTITY(1,1) NOT NULL,
	[motivo] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_motivo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[personal]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[personal](
	[id_personal] [int] IDENTITY(1,1) NOT NULL,
	[id_area] [int] NOT NULL,
	[id_cargo] [int] NOT NULL,
	[ci] [text] NOT NULL,
	[apaterno] [text] NULL,
	[amaterno] [text] NULL,
	[nombres] [text] NOT NULL,
	[direccion] [text] NOT NULL,
	[telefonos] [text] NOT NULL,
	[ubicacion] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_personal] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[registro_activos]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[registro_activos](
	[id_registro_activos] [int] IDENTITY(1,1) NOT NULL,
	[id_empresa] [int] NOT NULL,
	[id_grupo_contable] [int] NOT NULL,
	[id_tipo_cambio] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[antiguedad] [text] NULL,
	[descripcion] [text] NOT NULL,
	[n_adjuntos] [int] NOT NULL,
	[fecha_compra] [date] NOT NULL,
	[n_cbt] [int] NULL,
	[factura] [text] NULL,
	[costo] [float] NOT NULL,
	[c_cred_fiscal] [float] NULL,
	[s_cred_fiscal] [float] NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_registro_activos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[registro_individual]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[registro_individual](
	[id_registro_individual] [int] IDENTITY(1,1) NOT NULL,
	[id_registro_activos] [int] NOT NULL,
	[id_activo] [int] NOT NULL,
	[id_estado_activo] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[paginacion] [text] NULL,
	[correlativo_cantidad] [int] NULL,
	[gestion] [int] NOT NULL,
	[descripcion_act] [text] NULL,
	[marca] [text] NULL,
	[modelo] [text] NULL,
	[serie] [text] NULL,
	[costo] [float] NOT NULL,
	[observaciones] [text] NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_registro_individual] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[rol]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[rol](
	[id_rol] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [text] NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_rol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tipo_cambio]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipo_cambio](
	[id_tipo_cambio] [int] IDENTITY(1,1) NOT NULL,
	[sus_venta] [float] NOT NULL,
	[sus_compra] [float] NOT NULL,
	[ufv_venta] [float] NULL,
	[ufv_compra] [float] NULL,
	[id_usuario_reg] [int] NOT NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_tipo_cambio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[transferencia_activos]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[transferencia_activos](
	[id_transferencia_activos] [int] IDENTITY(1,1) NOT NULL,
	[id_registro_individual] [int] NOT NULL,
	[id_usuario_trans] [int] NOT NULL,
	[id_usuario_reg] [int] NOT NULL,
	[observaciones] [text] NULL,
	[fecha_traspaso] [date] NOT NULL,
	[fecha_reg] [date] NOT NULL,
	[estado] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_transferencia_activos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuarios]    Script Date: 22/10/2024 17:00:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuarios](
	[id_usuario] [int] IDENTITY(1,1) NOT NULL,
	[id_personal] [int] NOT NULL,
	[id_rol] [int] NOT NULL,
	[usuario] [varchar](200) NOT NULL,
	[pws_usuario] [varchar](300) NOT NULL,
	[estado] [bit] NOT NULL,
	[fecha_reg] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[area] ON 

INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (1, 1, 1, N'GERENCIA', N'1.1', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (2, 1, 2, N'ASESORÍA LEGAL', N'1.2', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (3, 1, 3, N'ÁREA ADMINISTRATIVA', N'1.3', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (4, 2, 1, N'UNIDAD DE INFORMÁTICA', N'2.1', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (5, 2, 2, N'UNIDAD DE PERSONAL', N'2.2', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (6, 2, 3, N'UNIDAD DE ALMACENES Y SUMINISTROS', N'2.3', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (7, 2, 4, N'ÁREA CONTABLE', N'2.4', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (8, 3, 1, N'ADM. SUCURSAL 1', N'3.1', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (9, 3, 2, N'COCINA', N'3.2', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (10, 3, 3, N'SALON 1', N'3.3', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (11, 3, 4, N'SALON 2', N'3.4', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (12, 4, 1, N'ADM. SUCURSAL 2', N'4.1', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (13, 4, 2, N'COCINA', N'4.2', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (14, 4, 3, N'SALON 1', N'4.3', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (15, 4, 4, N'SALON 2', N'4.4', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (16, 5, 1, N'COCINA', N'5.1', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (17, 5, 2, N'SALON 1', N'5.2', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[area] ([id_area], [id_departamento], [codigo_area], [nom_area], [ubicacion_area], [estado], [fecha_reg]) VALUES (18, 5, 3, N'SALON 1', N'5.3', 1, CAST(N'2024-10-18' AS Date))
SET IDENTITY_INSERT [dbo].[area] OFF
GO
SET IDENTITY_INSERT [dbo].[cargo] ON 

INSERT [dbo].[cargo] ([id_cargo], [descripcion], [estado], [fecha_reg]) VALUES (1, N'SOPORTE TÉCNICO', 1, CAST(N'2024-10-18' AS Date))
SET IDENTITY_INSERT [dbo].[cargo] OFF
GO
SET IDENTITY_INSERT [dbo].[departamentos] ON 

INSERT [dbo].[departamentos] ([id_departamento], [codigo_departamento], [nom_departamento], [estado], [fecha_reg]) VALUES (1, 1, N'GERENCIA', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[departamentos] ([id_departamento], [codigo_departamento], [nom_departamento], [estado], [fecha_reg]) VALUES (2, 2, N'UNIDADES ADMINISTRATIVAS', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[departamentos] ([id_departamento], [codigo_departamento], [nom_departamento], [estado], [fecha_reg]) VALUES (3, 3, N'ADMINISTRACIÓN SUCURSAL 1', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[departamentos] ([id_departamento], [codigo_departamento], [nom_departamento], [estado], [fecha_reg]) VALUES (4, 4, N'ADMINISTRACIÓN SUCURSAL 2', 1, CAST(N'2024-10-18' AS Date))
INSERT [dbo].[departamentos] ([id_departamento], [codigo_departamento], [nom_departamento], [estado], [fecha_reg]) VALUES (5, 5, N'ADMINISTRACIÓN SUCURSAL 3', 1, CAST(N'2024-10-18' AS Date))
SET IDENTITY_INSERT [dbo].[departamentos] OFF
GO
SET IDENTITY_INSERT [dbo].[personal] ON 

INSERT [dbo].[personal] ([id_personal], [id_area], [id_cargo], [ci], [apaterno], [amaterno], [nombres], [direccion], [telefonos], [ubicacion], [estado], [fecha_reg]) VALUES (2, 4, 1, N'4284552', N'MARTINEZ', N'MALDONADO', N'SANDRA KELLY', N'PASAJE C No. 4 Z. BARRIO FERROVIARIO', N'72539109', N'9.1.3', 1, CAST(N'2024-10-18' AS Date))
SET IDENTITY_INSERT [dbo].[personal] OFF
GO
SET IDENTITY_INSERT [dbo].[rol] ON 

INSERT [dbo].[rol] ([id_rol], [descripcion], [estado], [fecha_reg]) VALUES (1, N'administrador', 1, CAST(N'2024-10-18' AS Date))
SET IDENTITY_INSERT [dbo].[rol] OFF
GO
SET IDENTITY_INSERT [dbo].[usuarios] ON 

INSERT [dbo].[usuarios] ([id_usuario], [id_personal], [id_rol], [usuario], [pws_usuario], [estado], [fecha_reg]) VALUES (1, 2, 1, N'admin', N'8d4db54daf7d67db5f3c96e43f61c609', 1, CAST(N'2024-10-18' AS Date))
SET IDENTITY_INSERT [dbo].[usuarios] OFF
GO
ALTER TABLE [dbo].[activo] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[area] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[asignacion_activos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[baja_activos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[cargo] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[departamentos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[depresiacion] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[devolucion_activos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[empresas] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[estado_activo] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[grupo_contable] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[motivo_baja] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[personal] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[registro_activos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[registro_individual] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[rol] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tipo_cambio] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[transferencia_activos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[usuarios] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[activo]  WITH CHECK ADD FOREIGN KEY([id_grupo_contable])
REFERENCES [dbo].[grupo_contable] ([id_grupo_contable])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[area]  WITH CHECK ADD FOREIGN KEY([id_departamento])
REFERENCES [dbo].[departamentos] ([id_departamento])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[asignacion_activos]  WITH CHECK ADD FOREIGN KEY([id_registro_individual])
REFERENCES [dbo].[registro_individual] ([id_registro_individual])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[asignacion_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_asig])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[asignacion_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[baja_activos]  WITH CHECK ADD FOREIGN KEY([id_motivo])
REFERENCES [dbo].[motivo_baja] ([id_motivo])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[baja_activos]  WITH CHECK ADD FOREIGN KEY([id_registro_individual])
REFERENCES [dbo].[registro_individual] ([id_registro_individual])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[baja_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[depresiacion]  WITH CHECK ADD FOREIGN KEY([id_estado_activo])
REFERENCES [dbo].[estado_activo] ([id_estado_activo])
GO
ALTER TABLE [dbo].[depresiacion]  WITH CHECK ADD FOREIGN KEY([id_registro_individual])
REFERENCES [dbo].[registro_individual] ([id_registro_individual])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[depresiacion]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[devolucion_activos]  WITH CHECK ADD FOREIGN KEY([id_registro_individual])
REFERENCES [dbo].[registro_individual] ([id_registro_individual])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[devolucion_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_dev])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[devolucion_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[personal]  WITH CHECK ADD FOREIGN KEY([id_area])
REFERENCES [dbo].[area] ([id_area])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[personal]  WITH CHECK ADD FOREIGN KEY([id_cargo])
REFERENCES [dbo].[cargo] ([id_cargo])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[registro_activos]  WITH CHECK ADD FOREIGN KEY([id_empresa])
REFERENCES [dbo].[empresas] ([id_empresa])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[registro_activos]  WITH CHECK ADD FOREIGN KEY([id_grupo_contable])
REFERENCES [dbo].[grupo_contable] ([id_grupo_contable])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[registro_activos]  WITH CHECK ADD FOREIGN KEY([id_tipo_cambio])
REFERENCES [dbo].[tipo_cambio] ([id_tipo_cambio])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[registro_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[registro_individual]  WITH CHECK ADD FOREIGN KEY([id_activo])
REFERENCES [dbo].[activo] ([id_activo])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[registro_individual]  WITH CHECK ADD FOREIGN KEY([id_estado_activo])
REFERENCES [dbo].[estado_activo] ([id_estado_activo])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[registro_individual]  WITH CHECK ADD FOREIGN KEY([id_registro_activos])
REFERENCES [dbo].[registro_activos] ([id_registro_activos])
GO
ALTER TABLE [dbo].[registro_individual]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[tipo_cambio]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[transferencia_activos]  WITH CHECK ADD FOREIGN KEY([id_registro_individual])
REFERENCES [dbo].[registro_individual] ([id_registro_individual])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[transferencia_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_trans])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[transferencia_activos]  WITH CHECK ADD FOREIGN KEY([id_usuario_reg])
REFERENCES [dbo].[usuarios] ([id_usuario])
GO
ALTER TABLE [dbo].[usuarios]  WITH CHECK ADD FOREIGN KEY([id_personal])
REFERENCES [dbo].[personal] ([id_personal])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[usuarios]  WITH CHECK ADD FOREIGN KEY([id_rol])
REFERENCES [dbo].[rol] ([id_rol])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
USE [master]
GO
ALTER DATABASE [activos_csa] SET  READ_WRITE 
GO
