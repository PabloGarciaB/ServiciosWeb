using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ProyectoAPIRest
{
    public partial class Almacen : Form
    {
        public Almacen()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void btnAgregarProd_Click(object sender, EventArgs e)
        {
            AgregarProducto VistaAgregar = new AgregarProducto();
            VistaAgregar.ShowDialog();
        }

        private void btnSalir_Click(object sender, EventArgs e)
        {
            const string message =
            "¿Estas seguro que quieres salir de esta ventana?";
            const string caption = "Salir";
            var result = MessageBox.Show(message, caption,
                                         MessageBoxButtons.YesNo,
                                         MessageBoxIcon.Question);
            if (result == DialogResult.Yes)
            {
                Form_Login Login = new Form_Login();
                Login.ShowDialog();
            }
        }

        private void btnActDetalles_Click(object sender, EventArgs e)
        {
            ActualizarProducto FormAct = new ActualizarProducto();
            FormAct.Show();
        }

        private void btnEliminarProd_Click(object sender, EventArgs e)
        {
            EliminarProducto FormEliminar = new EliminarProducto();
            FormEliminar.Show();
        }
    }
}
