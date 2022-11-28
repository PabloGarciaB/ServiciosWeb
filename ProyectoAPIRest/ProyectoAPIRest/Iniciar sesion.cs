using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net.Http;
using Newtonsoft.Json.Linq;

namespace ProyectoAPIRest
{

    public partial class Form_Login : Form

    {
        public Form_Login()
        {
            InitializeComponent();

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {
        }

        private void btnAbrir_Click(object sender, EventArgs e)
        {
            var user = textBoxUser.Text;
            if (user == "pruebas1")
            {
                VentasProductos FormVentas = new VentasProductos();
                FormVentas.ShowDialog();
            }
            else if (user == "pruebas2")
            {
                Almacen FormAlmacen = new Almacen();
                FormAlmacen.ShowDialog();
            }
            else
            {
                const string message =
                    "Ingresa un usuario correcto";
                const string caption = "Error";
                var result = MessageBox.Show(message, caption, MessageBoxButtons.OK);
            }

        }


    }
}
